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

use App\Models\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('students.show');

        try {
            DB::beginTransaction();

            $students = Student::orderBy('created_at', 'desc')->get();

            return view('students.index')->with(compact('students'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        $this->authorize('students.show');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);
            switch ($student->status) {
                case 0:
                    $student->status_text = 'Inactivo';
                    break;
                default:
                    $student->status_text = 'Activo';
                    break;
            }

            return response()->json([
                'student' => $student,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function edit($id)
    {
        $this->authorize('students.edit');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);
            switch ($student->status) {
                case 0:
                    $student->status_text = 'Inactivo';
                    break;
                default:
                    $student->status_text = 'Activo';
                    break;
            }

            return response()->json([
                'student' => $student,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function update(Request $request, $id)
    {
        $this->authorize('students.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'numero_documento' => ['required', 'string', 'max:255', Rule::unique('students', 'document_number')->ignore($id)],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'estado' => ['required', 'numeric', Rule::in([0, 1])],
        ]);

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);
            $student->name = $request->nombre;
            $student->document_number = $request->numero_documento;
            $student->phone_number = $request->telefono;
            $student->email = Str::lower($request->email);
            $student->status = $request->estado;
            $student->save();

            DB::commit();

            return response()->json([
                'message' => 'El estudiante ' . $student->name . ' ha sido actualizado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede actualizar el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }
    
    public function get_status($id)
    {
        $this->authorize('students.edit_status');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            return response()->json([
                'student' => $student,
                'message' => '¿Está seguro de actualizar el estado del estudiante ' . $student->name . '?',
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function update_status($id)
    {
        $this->authorize('students.edit_status');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);
            switch ($student->status) {
                case 0:
                    $student->status = 1;
                    $tipo = 'activado';
                    break;
                default:
                    $student->status = 0;
                    $tipo = 'inactivado';
                    break;
            }
            $student->save();

            DB::commit();

            return response()->json([
                'message' => 'El estudiante ' . $student->name . ' ha sido ' . $tipo . ' correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede actualizar el estado del registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function get_email($id)
    {
        $this->authorize('students.edit');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            return response()->json([
                'student' => $student,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function update_email(Request $request, $id)
    {
        $this->authorize('students.edit');

        $this->validate($request, [
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);
            $student->email = Str::lower($request->email);
            $student->save();

            DB::commit();

            return response()->json([
                'message' => 'El correo electrónico del estudiante ' . $student->name . ' ha sido actualizado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede actualizar el correo electrónico del registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function get_destroy($id)
    {
        $this->authorize('students.destroy');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            return response()->json([
                'student' => $student,
                'message' => '¿Está seguro de eliminar el estudiante ' . $student->name . '?',
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function destroy($id)
    {
        $this->authorize('students.destroy');

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);
            $student->delete();

            DB::commit();

            return response()->json([
                'message' => 'El estudiante ' . $student->name . ' ha sido eliminado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            if (stripos($e->getMessage(), 'Integrity constraint violation')) {
                return response()->json([
                    'message' => 'No se puede completar la eliminación. El estudiante está siendo utilizado por otro registro dentro del sistema.',
                    'type' => 'error',
                ]);
            }
            return response()->json([
                'message' => 'No se puede eliminar el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }
}
