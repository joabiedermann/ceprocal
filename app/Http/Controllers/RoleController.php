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

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
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
        // $this->authorize('roles.show');

        try {
            DB::beginTransaction();

            $roles = Role::orderBy('name', 'asc')->get();

            return view('roles.index')->with(compact('roles'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        // $this->authorize('roles.show');

        try {
            DB::beginTransaction();

            $role = Role::with('permissions')->findOrFail($id);
            $permisos = Permission::get();
            switch ($role->status) {
                case 0:
                    $role->status_text = 'Inactivo';
                    break;
                default:
                    $role->status_text = 'Activo';
                    break;
            }

            return view('roles.show')->with(compact('role', 'permisos'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function create()
    {
        // $this->authorize('roles.create');

        try {
            DB::beginTransaction();

            $roles = Role::where('status', 1)->get();
            $permisos = Permission::get();

            return view('roles.create')->with(compact('roles', 'permisos'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador');
        }
    }

    public function store(Request $request)
    {
        // $this->authorize('roles.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')],
            'cantidad_permisos' => ['nullable', 'numeric'],
            'permisos' => ['required', 'array'],
            'padres' => ['nullable', 'array']
        ]);

        try {
            DB::beginTransaction();

            $role = new Role();
            $role->name = $request->nombre;
            $permisos = array_keys($request->permisos);
            $role->syncPermissions($permisos);
            $role->save();

            DB::commit();

            return redirect()->route('roles.index')->with('success', 'El rol ' . $role->name . ' ha sido creado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede crear el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    
    public function edit($id)
    {
        // $this->authorize('roles.edit');

        try {
            DB::beginTransaction();

            $role = Role::findOrFail($id);
            $permisos = Permission::get();

            return view('roles.edit')->with(compact('role', 'permisos'));
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
        // $this->authorize('roles.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($id)],
            'estado' => ['required', Rule::in([0, 1])],
            'cantidad_permisos' => ['nullable', 'numeric'],
            'permisos' => ['required', 'array'],
            'padres' => ['nullable', 'array']
        ]);

        try {
            DB::beginTransaction();

            $role = Role::findOrFail($id);
            $role->name = $request->nombre;
            $permisos = array_keys($request->permisos);
            $role->syncPermissions($permisos);
            $role->status = $request->estado;
            $role->save();

            DB::commit();

            return redirect()->route('roles.index')->with('success', 'El rol ' . $role->name . ' ha sido actualizado correctamente.');
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
        // $this->authorize('roles.edit_status');

        try {
            DB::beginTransaction();

            $role = Role::findOrFail($id);

            return response()->json([
                'role' => $role,
                'message' => '¿Está seguro de actualizar el estado del rol ' . $role->name . '?',
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
        // $this->authorize('roles.edit_status');

        try {
            DB::beginTransaction();

            $role = Role::findOrFail($id);
            switch ($role->status) {
                case 0:
                    $role->status = 1;
                    $tipo = 'activado';
                    break;
                default:
                    $role->status = 0;
                    $tipo = 'inactivado';
                    break;
            }
            $role->save();

            DB::commit();

            return response()->json([
                'message' => 'El rol ' . $role->name . ' ha sido ' . $tipo . ' correctamente.',
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
        // $this->authorize('roles.destroy');

        try {
            DB::beginTransaction();

            $role = Role::findOrFail($id);

            return response()->json([
                'role' => $role,
                'message' => '¿Está seguro de eliminar el rol ' . $role->name . '?',
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
        // $this->authorize('roles.destroy');

        try {
            DB::beginTransaction();

            $role = Role::findOrFail($id);
            $role->delete();

            DB::commit();

            return response()->json([
                'message' => 'El rol ' . $role->name . ' ha sido eliminado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            if (stripos($e->getMessage(), 'Integrity constraint violation')) {
                return response()->json([
                    'message' => 'No se puede completar la eliminación. El rol está siendo utilizado por otro registro dentro del sistema.',
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
