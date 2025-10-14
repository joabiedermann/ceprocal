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
use App\Models\Teacher;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseCompany;
use App\Models\CourseStudent;

use App\Jobs\GeneratePdfJob;
use App\Jobs\SendCertificateJob;

use Spatie\LaravelPdf\Facades\Pdf;

class CertificateController extends Controller
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
        // $this->authorize('certificates.shipments');

        try {
            DB::beginTransaction();

            $courses = Course::orderBy('created_at', 'desc')->get();
            
            return view('certificates.shipments')->with(compact('courses'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador');
        }
    }

    public function show_shipment($id)
    {
        // $this->authorize('certificates.show_shipment');

        try {
            DB::beginTransaction();

            $course = Course::with('students')->findOrFail($id);
            switch ($course->status) {
                case 0:
                    $course->status_text = 'Inactivo';
                    break;
                default:
                    $course->status_text = 'Activo';
                    break;
            }
            $course->start_date = Carbon::parse($course->start_date)->format('d/m/Y');
            $course->end_date = Carbon::parse($course->end_date)->format('d/m/Y');
            switch ($course->hours) {
                case 1:
                    $course->text_hours = 'hora';
                    break;
                default:
                    $course->text_hours = 'horas';
                    break;
            }
            
            return view('certificates.show_shipment')->with(compact('course'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro . Contacte con el administrador');
        }
    }

    public function import()
    {
        // $this->authorize('certificates.upload');

        try {
            DB::beginTransaction();

            $errores = collect();
            
            return view('certificates.import')->with(compact('errores'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser cargada. Contacte con el administrador');
        }
    }

    public function upload(Request $request)
    {
        // $this->authorize('certificates.upload');

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
            $path = 'public/temp';
            // Crear el path si no existe
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
            $filename = 'temp-' . Carbon::now()->format('dmYHis') . '.' . $extension;
            Storage::putFileAs($path . '/', $file, $filename);

            $path_file = str_replace('public', 'storage', $path) . '/' . $filename;

            $students = collect();
            $course = new \stdClass();
            $teacher = new \stdClass();
            $modules = collect();
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
                    'hoja' => 'Estudiantes',
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
                        'hoja' => 'Estudiantes',
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

            $expected_headers = ['curso',
                'fecha_inicio',
                'fecha_fin',
                'cantidad_horas',
                'docente',
                'numero_documento',
                'numero_telefono',
                'correo_electronico'];
            $spreedsheet_headers = SimpleExcelReader::create($path_file)
                ->fromSheet(2)
                ->headersToSnakeCase()
                ->getHeaders();
            $missing_headers = array_diff($expected_headers, $spreedsheet_headers);

            if (!empty($missing_headers)) {
                $errores->push([
                    'hoja' => 'Curso',
                    'fila' => '---',
                    'columna' => implode(', ', $missing_headers),
                    'error' => 'Falta la columna ' . implode(', ', $missing_headers) .  ' en el archivo Excel',
                ]);
            }

            $rows_course = SimpleExcelReader::create($path_file)
                ->fromSheet(2)
                ->headersToSnakeCase()
                ->getRows();
            $rows_course->each(function (array $row, $index) use ($course, $teacher, $errores) {
                $validator = Validator::make($row, [
                    'curso' => ['required', 'string', 'max:255', Rule::unique('courses', 'name')],
                    'fecha_inicio' => ['required', 'date'],
                    'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
                    'cantidad_horas' => ['required', 'numeric', 'min:1', 'digits_between:1,3'],
                    'docente' => ['required', 'string', 'max:255', 'regex:/^.+,.+$/'],
                    'numero_documento' => ['required', 'regex:/^([A-Fa-f]\d*|\d+)$/'],
                    'numero_telefono' => ['nullable', 'numeric', 'digits_between:8,9'],
                    'correo_electronico' => ['required', 'email'],
                ]);

                if ($validator->fails()) {
                    $errores->push([
                        'hoja' => 'Curso',
                        'fila' => $index + 1, // +1 porque fila 1 son headers
                        'columna' => $validator->errors()->keys(),
                        'error' => $validator->errors()->all(),
                    ]);
                } else {
                    $course->name = $row['curso'] ?? null;
                    $course->start_date = Carbon::parse($row['fecha_inicio'])->format('Y-m-d') ?? null;
                    $course->end_date = Carbon::parse($row['fecha_fin'])->format('Y-m-d') ?? null;
                    $course->hours = $row['cantidad_horas'] ?? null;
                    
                    $teacher->name = $row['docente'] ?? null;
                    $teacher->document_number = $row['numero_documento'] ?? null;
                    $teacher->phone_number = $row['numero_telefono'] ?? null;
                    $teacher->email = $row['correo_electronico'] ?? null;
                }
            });

            $expected_headers = ['numero',
                'nombre'];
            $spreedsheet_headers = SimpleExcelReader::create($path_file)
                ->fromSheet(3)
                ->headersToSnakeCase()
                ->getHeaders();
            $missing_headers = array_diff($expected_headers, $spreedsheet_headers);

            if (!empty($missing_headers)) {
                $errores->push([
                    'hoja' => 'Modulos',
                    'fila' => '---',
                    'columna' => implode(', ', $missing_headers),
                    'error' => 'Falta la columna ' . implode(', ', $missing_headers) .  ' en el archivo Excel',
                ]);
            }

            $rows_modules = SimpleExcelReader::create($path_file)
                ->fromSheet(3)
                ->headersToSnakeCase()
                ->getRows();
            $rows_modules->each(function (array $row, $index) use ($modules, $errores) {
                $validator = Validator::make($row, [
                    'numero' => ['required', 'string', 'max:3', 'regex:/^[IVXLCDM]{1,3}$/i'],
                    'nombre' => ['required', 'string'],
                ]);

                if ($validator->fails()) {
                    $errores->push([
                        'hoja' => 'Modulos',
                        'fila' => $index + 1, // +1 porque fila 1 son headers
                        'columna' => $validator->errors()->keys(),
                        'error' => $validator->errors()->all(),
                    ]);
                } else {
                    $data = [
                        'number' => $row['numero'] ?? null,
                        'description' => $row['nombre'] ?? null,
                    ];
                    $modules->push($data);
                }
            });

            if ($errores->isNotEmpty()) {
                Storage::disk('public')->delete(str_replace('storage/', '', $path_file));

                return back()->with('errores', $errores->values()->all());
            }

            Storage::disk('public')->delete(str_replace('storage/', '', $path_file));

            return view ('certificates.temporal_import')->with(compact('students' , 'teacher', 'course', 'modules'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'El archivo no pudo ser importado. Contacte con el administrador');
        }
    }

    public function get_upload(Request $request)
    {
        // $this->authorize('certificates.upload');

        try {
            $course_id = $this->store($request);
            return redirect()->route('certificates.show_shipment', $course_id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'El archivo no pudo ser importado. Contacte con el administrador');
        }
    }

    public function store(Request $request)
    {
        // $this->authorize('certificates.upload');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255', Rule::unique('courses', 'name')],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'horas' => ['required', 'numeric', 'min:1', 'digits_between:1,3'],
            'docente' => ['required', 'string', 'max:255'],
            'documento_docente' => ['required', 'regex:/^([A-Fa-f]\d*|\d+)$/'],
            'telefono_docente' => ['required', 'numeric', 'digits_between:8,9'],
            'correo_docente' => ['required', 'email'],
            'estudiantes' => ['required', 'array'],
            'estudiantes.*.nombre' => ['required', 'string', 'max:255'],
            'estudiantes.*.documento' => ['required', 'regex:/^([A-Fa-f]\d*|\d+)$/'],
            'estudiantes.*.telefono' => ['required', 'numeric', 'digits_between:8,9'],
            'estudiantes.*.correo' => ['required', 'email'],
            'modulos.*.modulo' => ['required', 'string', 'max:3', 'regex:/^[IVXLCDM]{1,3}$/i'],
            'modulos.*.descripcion' => ['required', 'string']
        ]);

        try {
            DB::beginTransaction();

            if (Teacher::where('document_number', Str::upper($request->documento_docente))->exists()) {
                $teacher = Teacher::where('document_number', Str::upper($request->documento_docente))->first();
            } else {
                $teacher = new Teacher();
                $teacher->name = $request->docente;
                $teacher->document_number = Str::upper($request->documento_docente);
                $teacher->phone_number = 0 . $request->telefono_docente;
                $teacher->email = Str::lower($request->correo_docente);
                $teacher->save();
            }

            $course = new Course();
            $course->name = $request->nombre;
            $course->teacher_id = $teacher->id;
            $course->start_date = $request->fecha_inicio;
            $course->end_date = $request->fecha_fin;
            $course->hours = $request->horas;
            $course->save();

            foreach ($request->modulos as $modulo) {
                $module = new CourseModule();
                $module->course_id = $course->id;
                $module->module = Str::upper($modulo['modulo']);
                $module->description = $modulo['descripcion'];
                $module->save();
            }

            foreach ($request->estudiantes as $estudiante) {
                if (Student::where('document_number', Str::upper($estudiante['documento']))->exists()) {
                    $student = Student::where('document_number', Str::upper($estudiante['documento']))->first();
                } else {
                    $student = new Student();
                    $student->name = $estudiante['nombre'];
                    $student->document_number = Str::upper($estudiante['documento']);
                    $student->phone_number = 0 . $estudiante['telefono'];
                    $student->email = Str::lower($estudiante['correo']);
                    $student->save();
                }

                $filename = $student->id . '_' . str_replace(' ', '', Str::title($student->name)) . '.pdf';

                $course_student = new CourseStudent();
                $course_student->course_id = $course->id;
                $course_student->student_id = $student->id;
                $course_student->hash_certificate = Str::random(20);                
                $course_student->path_certificate = 'storage/certificates/' . str_replace(' ', '-', Str::lower($course->name)) . '/' . $filename;
                $course_student->save();
            }

            $course = Course::where('id', $course->id)->first();
            if (!$course) {
                return back()->with('error', 'Los datos importados no pudieron ser guardados. Contacte con el administrador');
            }

            DB::commit();

            GeneratePdfJob::dispatch($course, $course->students);

            return $course->id;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return back()->with('error', 'Los datos importados no pudieron ser guardados. Contacte con el administrador');
        }
    }

    public function generate_pdf()
    {
        return Pdf::view('certificates.pdf_test')
                    ->format('a4')
                    ->landscape();
    }

    protected ?string $ms_token = null;

    public function connect(): ?string
    {
        // $this->authorize('certificates.send');

        try {
            DB::beginTransaction();

            $client_id = env('MSGRAPH_CLIENT_ID');
            $client_secret = env('MSGRAPH_SECRET_ID');
            $tenant_id = env('MSGRAPH_TENANT_ID');

            $url = 'https://login.microsoftonline.com/' . $tenant_id . '/oauth2/v2.0/token';
            $scope = env('MSGRAPH_SCOPE');

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
        // $this->authorize('certificates.send');

        try {
            DB::beginTransaction();

            $course_student = CourseStudent::find($id);

            if (empty($course_student)) {
                Log::error('No se encontró la relación de curso-estudiante con ID: ' . $id);
                return response()->json([
                    'message' => 'No se encontró la relación de curso-estudiante. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }

            $course_student->send_status = 'Enviado';
            $course_student->send_date = Carbon::now();
            $course_student->save();

            DB::commit();

            $ms_token = $this->ms_token ?? $this->connect();
            if (!$ms_token) {
                Log::error('No se pudo obtener un token válido de Microsoft Graph para enviar el certificado del curso-estudiante con ID: ' . $course_student->id);
                return response()->json([
                    'message' => 'No se pudo obtener un token válido de Microsoft Graph. Contacte con el administrador',
                    'type' => 'error',
                ]);
            }
            
            SendCertificateJob::dispatch($course_student, $ms_token);

            return response()->json([
                    'message' => 'El correo se está enviando en segundo plano. Por favor, espere unos minutos y actualice la página',
                    'type' => 'success',
                ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Excepción al enviar certificado', [
                'message' => $e->getMessage(),
                'course_student_id' => $id,
            ]);
            return response()->json([
                    'message' => 'El correo no se pudo enviar. Contacte con el administrador',
                    'type' => 'error',
                ]);
        }
    }
}
