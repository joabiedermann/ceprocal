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
use App\Models\CourseCompany;

class CourseCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function store(Request $request, $id)
    {
        $this->authorize('courses.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            $company = new CourseCompany();
            $company->course_id = $course->id;
            $company->company_name = $request->nombre;
            
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $path = 'public/courses/companies';
            // Crear el path si no existe
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
            $filename = 'logo-' . Str::lower(str_replace(' ', '-', $course->name)) . '_' . Str::lower(str_replace(' ', '-', $company->company_name)) . '-' . Carbon::now()->format('dmYHis') . '.' . $extension;
            Storage::putFileAs($path . '/', $file, $filename);

            $company->company_logo = str_replace('public', 'storage', $path) . '/' . $filename;
            $company->save();

            DB::commit();

            return response()->json([
                'message' => 'El asociado ' . $company->company_name . ' del curso ha sido agregado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede agregar el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }
    
    public function edit($id)
    {
        $this->authorize('courses.edit');

        try {
            DB::beginTransaction();

            $company = CourseCompany::findOrFail($id);

            return response()->json([
                'company' => $company,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->authorize('courses.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'logo' => ['nullable',  'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        try {
            DB::beginTransaction();

            $company = CourseCompany::findOrFail($id);
            $company->company_name = $request->nombre;

            if ($request->logo) {
                Storage::disk('public')->delete(str_replace('storage/', '', $company->company_logo));

                $file = $request->logo;
                $extension = $file->getClientOriginalExtension();
                $path = 'courses/companies';

                // Crear el path si no existe
                if (!File::exists($path)) {
                    Storage::disk('public')->makeDirectory($path);
                }
                $filename = 'logo-' . Str::lower(str_replace(' ', '-', $company->course->name)) . '_' . Str::lower(str_replace(' ', '-', $company->company_name)) . '-' . Carbon::now()->format('dmYHis') . '.' . $extension;
                Storage::disk('public')->putFileAs($path . '/', $file, $filename);

                $company->company_logo = str_replace('public', 'storage', $path) . '/' . $filename;
            }
            $company->save();

            DB::commit();

            return response()->json([
                'message' => 'El asociado ' . $company->company_name . ' del curso ha sido actualizado correctamente.',
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

    public function get_destroy($id)
    {
        $this->authorize('courses.destroy');

        try {
            DB::beginTransaction();

            $company = CourseCompany::findOrFail($id);

            return response()->json([
                'company' => $company,
                'message' => '¿Está seguro de eliminar el asociado ' . $company->company_name . '?',
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
        $this->authorize('courses.destroy');

        try {
            DB::beginTransaction();

            $company = CourseCompany::findOrFail($id);
            Storage::disk('public')->delete(str_replace('storage/', '', $company->company_logo));
            $company->delete();

            DB::commit();

            return response()->json([
                'message' => 'El asociado ' . $company->company_name . ' ha sido eliminado correctamente.',
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
