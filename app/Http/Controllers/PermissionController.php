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

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
        // $this->authorize('permissions.show');

        try {
            DB::beginTransaction();

            $permisos = Permission::with('roles')->where('father_id', '!=', null)->get();

            return view('permissions.index')->with(compact('permisos'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        // $this->authorize('permissions.show');

        try {
            DB::beginTransaction();

            $permiso = Permission::with('roles')->findOrFail($id);
            $roles_count = $permiso->roles->count();

            foreach ($permiso->roles as $key => $role) {
                // Concatenamos el nombre del rol
                $permiso->roles_names .= $role->name;

                // Si no es el último rol, añadimos un guion
                if ($key < ($roles_count - 1)) {
                    $permiso->roles_names .= ' - ';
                }
            }

            return response()->json([
                'permiso' => $permiso,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador.',
                'type' => 'error',
            ]);
        }
    }
}
