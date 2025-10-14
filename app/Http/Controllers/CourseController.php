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

use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseCompany;
use App\Models\CourseStudent;
use App\Models\Teacher;

class CourseController extends Controller
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
        // $this->authorize('courses.show');

        try {
            DB::beginTransaction();

            $courses = Course::orderBy('created_at', 'desc')->get();

            return view('courses.index')->with(compact('courses'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        // $this->authorize('courses.show');

        try {
            DB::beginTransaction();

            $course = Course::with('teacher', 'modules', 'companies')->findOrFail($id);
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

            return view('courses.show')->with(compact('course'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }
    
    public function edit($id)
    {
        // $this->authorize('courses.edit');

        try {
            DB::beginTransaction();

            $course = Course::with('modules')->findOrFail($id);
            $teachers = Teacher::where('status', 1)->get();

            return view('courses.edit')->with(compact('course', 'teachers'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('courses.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'docente' => ['required', 'numeric', Rule::exists('teachers', 'id')],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'horas' => ['required', 'numeric', 'min:1', 'digits_between:1,3'],
            'estado' => ['required', Rule::in([0, 1])],
            'detalles' => ['required', 'array'],
            'detalles.*.modulo' => ['required', 'string', 'max:3', 'regex:/^[IVXLCDM]{1,3}$/i'],
            'detalles.*.descripcion' => ['required', 'string']
        ]);

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            $course->name = $request->nombre;
            $course->teacher_id = $request->docente;
            $course->start_date = $request->fecha_inicio;
            $course->end_date = $request->fecha_fin;
            $course->hours = $request->horas;
            $course->status = $request->estado;
            $course->save();

            CourseModule::where('course_id', $course->id)->delete();
            foreach ($request->detalles as $detalle) {
                $detail = new CourseModule();
                $detail->course_id = $course->id;
                $detail->module = $detalle['modulo'];
                $detail->description = $detalle['descripcion'];
                $detail->save();
            }

            DB::commit();

            return response()->json([
                'message' => 'El curso ' . $course->name . ' ha sido actualizado correctamente.',
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
        // $this->authorize('courses.edit_status');

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);

            return response()->json([
                'course' => $course,
                'message' => '¿Está seguro de actualizar el estado del curso ' . $course->name . '?',
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
        // $this->authorize('courses.edit_status');

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            switch ($course->status) {
                case 0:
                    $course->status = 1;
                    $tipo = 'activado';
                    break;
                default:
                    $course->status = 0;
                    $tipo = 'inactivado';
                    break;
            }
            $course->save();

            DB::commit();

            return response()->json([
                'message' => 'El curso ' . $course->name . ' ha sido ' . $tipo . ' correctamente.',
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
        // $this->authorize('courses.destroy');

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);

            return response()->json([
                'course' => $course,
                'message' => '¿Está seguro de eliminar el curso ' . $course->name . '?',
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
        // $this->authorize('courses.destroy');

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            CourseModule::where('course_id', $course->id)->delete();
            $companies = CourseCompany::where('course_id', $course->id)->get();
            CourseStudent::where('course_id', $course->id)->delete();
            if ($companies) {
                foreach ($companies as $company) {
                    Storage::disk('public')->delete(str_replace('storage', '', $company->company_logo));
                    $company->delete();
                }
            }
            $course->delete();

            DB::commit();

            return response()->json([
                'message' => 'El curso ' . $course->name . ' ha sido eliminado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            if (stripos($e->getMessage(), 'Integrity constraint violation')) {
                return response()->json([
                    'message' => 'No se puede completar la eliminación. El curso está siendo utilizado por otro registro dentro del sistema.',
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
