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

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
        // $this->authorize('users.show');

        try {
            DB::beginTransaction();

            $users = User::orderBy('created_at', 'desc')->get();

            return view('users.index')->with(compact('users'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        // $this->authorize('users.show');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            switch ($user->status) {
                case 0:
                    $user->status_text = 'Inactivo';
                    break;
                default:
                    $user->status_text = 'Activo';
                    break;
            }

            return response()->json([
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function create()
    {
        // $this->authorize('users.create');

        try {
            DB::beginTransaction();

            $roles = Role::where('status', 1)->get();

            return response()->json([
                'roles' => $roles,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede obtener el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function store(Request $request)
    {
        // $this->authorize('users.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')],
            'contrasena' => ['required', 'min:8', 'max:255', 'regex:/^[A-Za-z0-9]+$/'],
            'rol' => ['required', 'numeric', Rule::exists('roles', 'id')],
        ]);

        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->nombre;
            $user->password = Hash::make($request->contrasena);
            $user->email = Str::lower($request->email);
            $role = Role::findOrFail($request->rol);
            $user->assignRole($role);
            $user->save();

            DB::commit();

            return response()->json([
                'message' => 'El usuario ' . $user->name . ' ha sido creado correctamente.',
                'type' => 'success',
            ]);
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
        // $this->authorize('users.edit');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $roles = Role::where('status', 1)->get();
            switch ($user->status) {
                case 0:
                    $user->status_text = 'Inactivo';
                    break;
                default:
                    $user->status_text = 'Activo';
                    break;
            }

            return response()->json([
                'user' => $user,
                'roles' => $roles,
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
        // $this->authorize('users.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'rol' => ['required', 'numeric', Rule::exists('roles', 'id')],
            'estado' => ['required', 'numeric', Rule::in([0, 1])],
            'new_password' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
            'new_password_confirmation' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
        ], [
            'new_password.regex' => 'La contraseña debe contener al menos una letra y un número.',
            'new_password_confirmation.regex' => 'La contraseña debe contener al menos una letra y un número.',
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->name = $request->nombre;
            $user->email = Str::lower($request->email);
            $role = Role::findOrFail($request->rol);
            $user->assignRole($role);
            $user->status = $request->estado;
            if ($request->new_password) {
                $user->password = Hash::make($request->new_password);
            }
            $user->save();

            DB::commit();

            return response()->json([
                'message' => 'El usuario ' . $user->name . ' ha sido actualizado correctamente.',
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
        // $this->authorize('users.edit_status');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            return response()->json([
                'user' => $user,
                'message' => '¿Está seguro de actualizar el estado del usuario ' . $user->name . '?',
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
        // $this->authorize('users.edit_status');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            switch ($user->status) {
                case 0:
                    $user->status = 1;
                    $tipo = 'desbloqueado';
                    break;
                default:
                    $user->status = 0;
                    $tipo = 'bloqueado';
                    break;
            }
            $user->save();

            DB::commit();

            return response()->json([
                'message' => 'El usuario ' . $user->name . ' ha sido ' . $tipo . ' correctamente.',
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
        // $this->authorize('users.destroy');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            return response()->json([
                'user' => $user,
                'message' => '¿Está seguro de eliminar el usuario ' . $user->name . '?',
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
        // $this->authorize('users.destroy');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            return response()->json([
                'message' => 'El usuario ' . $user->name . ' ha sido eliminado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            if (stripos($e->getMessage(), 'Integrity constraint violation')) {
                return response()->json([
                    'message' => 'No se puede completar la eliminación. El usuario está siendo utilizado por otro registro dentro del sistema.',
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
