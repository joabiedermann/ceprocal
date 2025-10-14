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

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
       
    public function show($id)
    {
        // $this->authorize('profiles.show');

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            return view('users.profiles.show')->with(compact('user'));
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
        // $this->authorize('profiles.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->name = $request->nombre;
            $user->email = $request->correo;
            
            if ($request->avatar) {
                Storage::disk('public')->delete(str_replace('storage/', '', $user->avatar));

                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $path = 'public/users';
                // Crear el path si no existe
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true);
                }
                $filename = 'avatar-user-id-' . $user->id . '-' . Carbon::now()->format('dmYHis') . '.' . $extension;
                Storage::putFileAs($path . '/', $file, $filename);

                $user->avatar = str_replace('public', 'storage', $path) . '/' . $filename;
            }
            $user->save();

            DB::commit();

            return response()->json([
                'message' => 'Tu información personal ha sido actualizada correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede actalizar el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function update_password(Request $request, $id)
    {
        // $this->authorize('users.change_password');

        $this->validate($request, [
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'min:8', 'different:current_password', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
            'new_password_confirmation' => ['required', 'min:8', 'different:current_password', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
        ], [
            'new_password.regex' => 'La contraseña debe contener al menos una letra y un número.',
            'new_password_confirmation.regex' => 'La contraseña debe contener al menos una letra y un número.',
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::commit();

            return response()->json([
                'message' => 'Tu contraseña ha sido actualizada correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede actualizar la contraseña. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }

    public function inactivate(Request $request, $id)
    {
        // $this->authorize('profiles.inactivate');

        $this->validate($request, [
            'contrasena' => ['required', 'current_password'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            if ($user->hasRole('Superadmin')) {
                $superadmin_count = User::whereHas('roles', function ($query) {
                    $query->where('name', 'Superadmin');
                })->count();
                return response()->json([
                    'message' => 'No se puede desactivar su cuenta. Eres el único Superadmin.',
                    'type' => 'error',
                ]);
            }
            
            $user->status = 0;
            $user->save();

            DB::commit();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'message' => 'Su cuenta ha sido desactivada correctamente.',
                'type' => 'error',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede desactivar su cuenta. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }
}
