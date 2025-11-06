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

use App\Models\Teacher;

class TeacherController extends Controller
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
        $this->authorize('teachers.show');

        try {
            DB::beginTransaction();

            $teachers = Teacher::orderBy('created_at', 'desc')->get();

            return view('teachers.index')->with(compact('teachers'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        $this->authorize('teachers.show');

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);
            switch ($teacher->status) {
                case 0:
                    $teacher->status_text = 'Inactivo';
                    break;
                default:
                    $teacher->status_text = 'Activo';
                    break;
            }

            return response()->json([
                'teacher' => $teacher,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function edit($id)
    {
        $this->authorize('teachers.edit');

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);
            switch ($teacher->status) {
                case 0:
                    $teacher->status_text = 'Inactivo';
                    break;
                default:
                    $teacher->status_text = 'Activo';
                    break;
            }

            return response()->json([
                'teacher' => $teacher,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function update(Request $request, $id)
    {
        $this->authorize('teachers.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'numero_documento' => ['required', 'string', 'max:255', Rule::unique('teachers', 'document_number')->ignore($id)],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'estado' => ['required', 'numeric', Rule::in([0, 1])],
        ]);

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);
            $teacher->name = $request->nombre;
            $teacher->document_number = $request->numero_documento;
            $teacher->phone_number = $request->telefono;
            $teacher->email = Str::lower($request->email);
            $teacher->status = $request->estado;
            $teacher->save();

            DB::commit();

            return response()->json([
                'message' => 'El docente ' . $teacher->name . ' ha sido actualizado correctamente.',
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
        $this->authorize('teachers.edit_status');

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);

            return response()->json([
                'teacher' => $teacher,
                'message' => '¿Está seguro de actualizar el estado del docente ' . $teacher->name . '?',
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
        $this->authorize('teachers.edit_status');

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);
            switch ($teacher->status) {
                case 0:
                    $teacher->status = 1;
                    $tipo = 'activado';
                    break;
                default:
                    $teacher->status = 0;
                    $tipo = 'inactivado';
                    break;
            }
            $teacher->save();

            DB::commit();

            return response()->json([
                'message' => 'El docente ' . $teacher->name . ' ha sido ' . $tipo . ' correctamente.',
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

    public function get_destroy($id)
    {
        $this->authorize('teachers.destroy');

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);

            return response()->json([
                'teacher' => $teacher,
                'message' => '¿Está seguro de eliminar el docente ' . $teacher->name . '?',
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
        $this->authorize('teachers.destroy');

        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);
            $teacher->delete();

            DB::commit();

            return response()->json([
                'message' => 'El docente ' . $teacher->name . ' ha sido eliminado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            if (stripos($e->getMessage(), 'Integrity constraint violation')) {
                return response()->json([
                    'message' => 'No se puede completar la eliminación. El docente está siendo utilizado por otro registro dentro del sistema.',
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
