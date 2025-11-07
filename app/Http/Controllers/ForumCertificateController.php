<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

use App\Models\Student;
use App\Models\Forum;
use App\Models\ForumStudent;

use App\Jobs\GenerateForumPdfJob;

class ForumCertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function shipments()
    {
        $this->authorize('forums_certificates.shipments');

        try {
            DB::beginTransaction();

            $forums_certificates = Forum::orderBy('created_at', 'desc')->get();

            return view('forums_certificates.shipments')->with(compact('forums_certificates'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador');
        }
    }

    public function show_shipment($id)
    {
        $this->authorize('forums_certificates.show_shipment');

        try {
            DB::beginTransaction();

            $forum = Forum::with('students')->findOrFail($id);
            switch ($forum->status) {
                case 0:
                    $forum->status_text = 'Inactivo';
                    break;
                default:
                    $forum->status_text = 'Activo';
                    break;
            }
            $forum->date = Carbon::parse($forum->date)->format('d/m/Y');
            switch ($forum->hours) {
                case 1:
                    $forum->text_hours = 'hora';
                    break;
                default:
                    $forum->text_hours = 'horas';
                    break;
            }
            
            return view('forums_certificates.show_shipment')->with(compact('forum'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro . Contacte con el administrador');
        }
    }

    public function import()
    {
        $this->authorize('forums_certificates.upload');

        try {
            DB::beginTransaction();

            $errores = collect();
            
            return view('forums_certificates.import')->with(compact('errores'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser cargada. Contacte con el administrador');
        }
    }

    public function upload(Request $request)
    {
        $this->authorize('forums_certificates.upload');

        $this->validate($request, [
            'planilla' => ['required',
                'file',
                'mimes:xlsx,xls,csv',
                'mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'max:5120'],
        ]);

        try {            

            DB::beginTransaction();

            $file = $request->planilla;
            $extension = $file->getClientOriginalExtension();
            $path = 'temp';
            // Crear el path si no existe
            if (!File::exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }
            $filename = 'temp-' . Carbon::now()->format('dmYHis') . '.' . $extension;
            Storage::disk('public')->putFileAs($path . '/', $file, $filename);

            $path_file = 'storage/' . $path . '/' . $filename;

            $students = collect();
            $forum = new \stdClass();
            $errores   = collect();

            $expected_headers = ['apellido_nombre',
                'numero_documento',
                'numero_telefono',
                'correo_electronico'];
            $spreedsheet_headers = SimpleExcelReader::create($path_file)
                ->fromSheet(1)
                ->headersToSnakeCase()
                ->getHeaders();
            $missing_headers = array_diff($expected_headers, $spreedsheet_headers);

            if (!empty($missing_headers)) {
                $errores->push([
                    'hoja' => 'Participantes',
                    'fila' => '---',
                    'columna' => implode(', ', $missing_headers),
                    'error' => 'Falta la columna ' . implode(', ', $missing_headers) .  ' en el archivo Excel',
                ]);
            }

            $rows_students = SimpleExcelReader::create($path_file)
                ->fromSheet(1)
                ->headersToSnakeCase()
                ->getRows();
            $rows_students->each(function (array $row, $index) use ($students, $errores) {
                $validator = Validator::make($row, [
                    'apellido_nombre' => ['required', 'string', 'max:255', 'regex:/^.+,.+$/'],
                    'numero_documento' => ['required', 'regex:/^([A-Fa-f]\d*|\d+)$/'],
                    'numero_telefono' => ['nullable', 'numeric', 'digits_between:8,9'],
                    'correo_electronico' => ['required', 'email'],
                ]);

                if ($validator->fails()) {
                    $errores->push([
                        'hoja' => 'Participantes',
                        'fila' => $index + 1, // +1 porque fila 1 son headers
                        'columna' => $validator->errors()->keys(),
                        'error' => $validator->errors()->all(),
                    ]);
                } else {
                    $data = [
                        'name' => $row['apellido_nombre'] ?? null,
                        'document_number' => $row['numero_documento'] ?? null,
                        'phone_number' => $row['numero_telefono'] ?? null,
                        'email' => $row['correo_electronico'] ?? null,
                    ];
                    $students->push($data);
                }
            });

            $expected_headers = ['foro',
                'fecha',
                'cantidad_horas'];
            $spreedsheet_headers = SimpleExcelReader::create($path_file)
                ->fromSheet(2)
                ->headersToSnakeCase()
                ->getHeaders();
            $missing_headers = array_diff($expected_headers, $spreedsheet_headers);

            if (!empty($missing_headers)) {
                $errores->push([
                    'hoja' => 'Foro',
                    'fila' => '---',
                    'columna' => implode(', ', $missing_headers),
                    'error' => 'Falta la columna ' . implode(', ', $missing_headers) .  ' en el archivo Excel',
                ]);
            }

            $rows_forum = SimpleExcelReader::create($path_file)
                ->fromSheet(2)
                ->headersToSnakeCase()
                ->getRows();
            $rows_forum->each(function (array $row, $index) use ($forum, $errores) {
                $validator = Validator::make($row, [
                    'foro' => ['required', 'string', 'max:255', Rule::unique('forums', 'name')],
                    'fecha' => ['required', 'date'],
                    'cantidad_horas' => ['required', 'numeric', 'min:1', 'digits_between:1,3'],
                ]);

                if ($validator->fails()) {
                    $errores->push([
                        'hoja' => 'Foro',
                        'fila' => $index + 1, // +1 porque fila 1 son headers
                        'columna' => $validator->errors()->keys(),
                        'error' => $validator->errors()->all(),
                    ]);
                } else {
                    $forum->name = $row['foro'] ?? null;
                    $forum->date = Carbon::parse($row['fecha'])->format('Y-m-d') ?? null;
                    $forum->hours = $row['cantidad_horas'] ?? null;
                }
            });

            if ($errores->isNotEmpty()) {
                Storage::disk('public')->delete(str_replace('storage/', '', $path_file));

                return back()->with('errores', $errores->values()->all());
            }

            Storage::disk('public')->delete(str_replace('storage/', '', $path_file));

            return view ('forums_certificates.temporal_import')->with(compact('students' , 'forum'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'El archivo no pudo ser importado. Contacte con el administrador');
        }
    }

    public function get_upload(Request $request)
    {
        $this->authorize('forums_certificates.upload');

        try {
            $forum_id = $this->store($request);
            return redirect()->route('forums_certificates.shipments');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'El archivo no pudo ser importado. Contacte con el administrador');
        }
    }

    public function store(Request $request)
    {
        $this->authorize('forums_certificates.upload');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255', Rule::unique('forums', 'name')],
            'fecha' => ['required', 'date'],
            'horas' => ['required', 'numeric', 'min:1', 'digits_between:1,3'],
            'participantes' => ['required', 'array'],
            'participantes.*.nombre' => ['required', 'string', 'max:255'],
            'participantes.*.documento' => ['required', 'regex:/^([A-Fa-f]\d*|\d+)$/'],
            'participantes.*.telefono' => ['required', 'numeric', 'digits_between:8,9'],
            'participantes.*.correo' => ['required', 'email'],
        ]);

        try {
            DB::beginTransaction();

            $forum = new Forum();
            $forum->name = $request->nombre;
            $forum->date = $request->fecha;
            $forum->hours = $request->horas;
            $forum->save();

            foreach ($request->participantes as $participante) {
                if (Student::where('document_number', Str::upper($participante['documento']))->exists()) {
                    $student = Student::where('document_number', Str::upper($participante['documento']))->first();
                } else {
                    $student = new Student();
                    $student->name = $participante['nombre'];
                    $student->document_number = Str::upper($participante['documento']);
                    $student->phone_number = 0 . $participante['telefono'];
                    $student->email = Str::lower($participante['correo']);
                    $student->save();
                }

                $filename = $student->id . '_' . str_replace(' ', '', Str::title($student->name)) . '.pdf';

                $forum_student = new ForumStudent();
                $forum_student->forum_id = $forum->id;
                $forum_student->student_id = $student->id;
                $forum_student->hash_certificate = Str::random(20);                
                $forum_student->path_certificate = 'storage/forums_certificates/' . $forum->id . '/' . $filename;
                $forum_student->save();
            }

            $forum = Forum::where('id', $forum->id)->first();
            if (!$forum) {
                return back()->with('error', 'Los datos importados no pudieron ser guardados. Contacte con el administrador');
            }

            DB::commit();

            return $forum->id;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return back()->with('error', 'Los datos importados no pudieron ser guardados. Contacte con el administrador');
        }
    }

    public function generate_pdf($id)
    {
        try {
            DB::beginTransaction();

            $forum = Forum::find($id);
            if (empty($forum)) {
                Log::error('No se encontró el foro con ID: ' . $id);
                return response()->json([
                    'message' => 'No se encontró el foro. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }

            GenerateForumPdfJob::dispatch($forum, $forum->students);

            $forum->certificates_generated = 1;
            $forum->save();
            
            DB::commit();

            return response()->json([
                'message' => 'Los certificados en formato PDF fueron generados correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return back()->with('error', 'Los certificados en formato PDF no pudieron ser generados. Contacte con el administrador');
        }
    }

    protected ?string $ms_token = null;

    public function connect(): ?string
    {
        $this->authorize('forums_certificates.send');

        try {
            DB::beginTransaction();

            $client_id = 'e24e5e21-1485-4207-9868-5e702508e9e4'; // env('MSGRAPH_CLIENT_ID');
            $client_secret = 'Thh8Q~emRaPNY.G7VT4IfLyWAGHTqs1Pniht0aoL'; // env('MSGRAPH_SECRET_ID');
            $tenant_id = '5f16dc7a-be0a-4bd4-a259-54d1451ff53a'; // env('MSGRAPH_TENANT_ID');

            $url = 'https://login.microsoftonline.com/' . $tenant_id . '/oauth2/v2.0/token';
            $scope = 'https://graph.microsoft.com/.default'; // env('MSGRAPH_SCOPE');

            if (empty($client_id) || empty($client_secret) || empty($tenant_id) || empty($scope)) {
                Log::error('Faltan las credenciales de Microsoft Graph en el archivo .env', [
                    'client_id' => $client_id ? 'set' : 'not set',
                    'client_secret' => $client_secret ? 'set' : 'not set',
                    'tenant_id' => $tenant_id ? 'set' : 'not set',
                    'scope' => $scope ? 'set' : 'not set',
                ]);
                return back()->with('error', 'No se pudo obtener un token válido de Microsoft Graph. Contacte con el administrador');
            }

            $response = Http::asForm()->post($url, [
                'grant_type' => 'client_credentials',
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'scope' => $scope,
            ]);

            if ($response->failed()) {
                Log::error('Error al obtener token de Microsoft Graph', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return back()->with('error', 'No se pudo obtener un token válido de Microsoft Graph. Contacte con el administrador');
            }

            $this->ms_token = $response->json('access_token');

            return $this->ms_token;

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede establecer conexión con Microsoft Graph. Contacte con el administrador');
        }
    }

    public function send($id)
    {
        $this->authorize('forums_certificates.send');

        try {
            DB::beginTransaction();

            $forum_student = ForumStudent::find($id);

            if (empty($forum_student)) {
                Log::error('No se encontró la relación de foro-participante con ID: ' . $id);
                return response()->json([
                    'message' => 'No se encontró la relación de foro-participante. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }

            $forum = Forum::find($forum_student->forum_id);
            if (empty($forum)) {
                Log::error('No se encontró el foro con ID: ' . $forum_student->forum_id);
                return response()->json([
                    'message' => 'No se encontró el foro. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }

            $forum_student->send_status = 'Enviado';
            $forum_student->send_date = Carbon::now();
            $forum_student->save();

            DB::commit();

            $ms_token = $this->ms_token ?? $this->connect();
            if (!$ms_token) {
                Log::error('No se pudo obtener un token válido de Microsoft Graph para enviar el certificado del foro-participante con ID: ' . $forum_student->id);
                return response()->json([
                    'message' => 'No se pudo obtener un token válido de Microsoft Graph. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }

            $from = 'certificados@ceprocal.org.py'; // env('MSGRAPH_SENDER');

            if (empty($from)) {
                Log::error('No se ha configurado el remitente en las variables de entorno.');
                return;
            }

            $recipient = [
                ['emailAddress' => ['address' => $forum_student->student->email]],
            ];

            $file = Storage::disk('public')->get(str_replace('storage/', '', $forum_student->path_certificate));

            if (!$file) {
                Log::error('No se pudo leer el archivo adjunto desde el almacenamiento.', [
                    'path' => $forum_student->path_certificate
                ]);
                return;
            }

            $base64_file = base64_encode($file);

            $attachment = [
                [
                    '@odata.type' => '#microsoft.graph.fileAttachment',
                    'name' => 'Certificado.pdf',
                    'contentBytes' => $base64_file,
                ]
            ];

            $subject = 'Certificado de Finalización del Foro ' . $forum_student->forum->name;

            $body_content = "<p>Estimado/a <b>{$forum_student->student->name}</b>:</p>
                                <p>Agradecemos sinceramente la confianza depositada en CEPROCAL al participar del <b>{$forum_student->forum->name}</b> con un total de <b>{$forum_student->forum->hours}</b> horas.
                                <br>
                                Adjunto encontrará su certificado de participación, emitido en reconocimiento al cumplimiento del programa.</p>
                                <p>Nos alegra haber sido parte de esta etapa de su formación y queremos seguir acompañando su crecimiento profesional.
                                <br>
                                Lo/a invitamos a seguir nuestras novedades, próximos foros y actividades en nuestras redes sociales y página web:</p>
                                <p>🌐 <a href='https://www.ceprocal.org.py' target='_blank'>www.ceprocal.org.py</a>
                                <br>
                                📱 Facebook: @ceprocal | Instagram: @ceprocal</p>
                                <p>Atentamente,</p>
                                <p><b>CEPROCAL</b></p>";

            $body = [
                'message' => [
                    'subject' => $subject,
                    'body' => [
                        'contentType' => 'HTML',
                        'content' => $body_content,
                    ],
                    'toRecipients' => $recipient,
                    'attachments' => $attachment,
                ],
                'saveToSentItems' => false,
            ];

            
            $response = Http::withToken($this->ms_token)
                ->post('https://graph.microsoft.com/v1.0/users/' . $from . '/sendMail', $body);

            if ($response->successful()) {
                Log::info('Correo enviado correctamente a: ' . $forum_student->student->email);
            } else {
                Log::error('Error al enviar correo', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }
            
            return response()->json([
                    'message' => 'El correo fue enviado correctamente.',
                    'type' => 'success',
                ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Excepción al enviar certificado', [
                'message' => $e->getMessage(),
                'forum_student_id' => $id,
            ]);
            return response()->json([
                    'message' => 'El correo no se pudo enviar. Contacte con el administrador',
                    'type' => 'error',
                ]);
        }
    }

    public function send_massive($id)
    {
        $this->authorize('forums_certificates.send');

        try {
            DB::beginTransaction();

            $forum = Forum::find($id);

            $from = 'certificados@ceprocal.org.py'; // env('MSGRAPH_SENDER');
            if (empty($from)) {
                Log::error('No se ha configurado el remitente en las variables de entorno.');
                return;
            }

            $ms_token = $this->ms_token ?? $this->connect();
            if (!$ms_token) {
                Log::error('No se pudo obtener un token válido de Microsoft Graph para enviar los certificados del foro con ID: ' . $forum->id);
                return response()->json([
                    'message' => 'No se pudo obtener un token válido de Microsoft Graph. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }

            foreach ($forum->students as $forum_student) {
                $recipient = [
                    ['emailAddress' => ['address' => $forum_student->student->email]],
                ];

                $file = Storage::disk('public')->get(str_replace('storage/', '', $forum_student->path_certificate));

                if (!$file) {
                    Log::error('No se pudo leer el archivo adjunto desde el almacenamiento.', [
                        'path' => $forum_student->path_certificate
                    ]);
                    return;
                }

                $base64_file = base64_encode($file);

                $attachment = [
                    [
                        '@odata.type' => '#microsoft.graph.fileAttachment',
                        'name' => 'Certificado.pdf',
                        'contentBytes' => $base64_file,
                    ]
                ];

                $subject = 'Certificado de Finalización del Curso ' . $forum_student->forum->name;

                $body_content = "<p>Estimado/a <b>{$forum_student->student->name}</b>:</p>
                                <p>Agradecemos sinceramente la confianza depositada en CEPROCAL al participar del <b>{$forum_student->forum->name}</b> con un total de <b>{$forum_student->forum->hours}</b> horas.
                                <br>
                                Adjunto encontrará su certificado de participación, emitido en reconocimiento al cumplimiento del programa.</p>
                                <p>Nos alegra haber sido parte de esta etapa de su formación y queremos seguir acompañando su crecimiento profesional.
                                <br>
                                Lo/a invitamos a seguir nuestras novedades, próximos foros y actividades en nuestras redes sociales y página web:</p>
                                <p>🌐 <a href='https://www.ceprocal.org.py' target='_blank'>www.ceprocal.org.py</a>
                                <br>
                                📱 Facebook: @ceprocal | Instagram: @ceprocal</p>
                                <p>Atentamente,</p>
                                <p><b>CEPROCAL</b></p>";

                $body = [
                    'message' => [
                        'subject' => $subject,
                        'body' => [
                            'contentType' => 'HTML',
                            'content' => $body_content,
                        ],
                        'toRecipients' => $recipient,
                        'attachments' => $attachment,
                    ],
                    'saveToSentItems' => false,
                ];

                
                $response = Http::withToken($this->ms_token)
                    ->post('https://graph.microsoft.com/v1.0/users/' . $from . '/sendMail', $body);

                if ($response->successful()) {
                    Log::info('Correo enviado correctamente a: ' . $forum_student->student->email);
                } else {
                    Log::error('Error al enviar correo', [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);
                }

                $forum_student->send_status = 'Enviado';
                $forum_student->send_date = Carbon::now();
                $forum_student->save();
            }

            DB::commit();

            return response()->json([
                'message' => 'Los correos han sido enviados exitosamente.',
                'type' => 'success',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Excepción al enviar certificados', [
                'message' => $e->getMessage(),
                'forum' => $id,
            ]);
            return response()->json([
                    'message' => 'El correo no se pudo enviar. Contacte con el administrador',
                    'type' => 'error',
                ]);
        }
    }
}
