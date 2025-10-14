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

use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function show()
    {
        // $this->authorize('company.show');

        try {
            DB::beginTransaction();

            $company = Company::first();

            if (!$company) {
                return redirect()->route('company.create');
            }
            
            return view('company.show')->with(compact('company'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function create()
    {
        // $this->authorize('company.create');

        try {
            DB::beginTransaction();

            return view('company.create');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador');
        }
    }

    public function store(Request $request)
    {
        // $this->authorize('company.edit');

        $this->validate($request, [
            'nombre_fantasia' => ['required', 'string', 'max:255'],
            'razon_social' => ['required', 'string', 'max:255'],
            'ruc' => ['required', 'string', 'regex:/^\d+-\d$/'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'digits_between:8,9'],
            'pais' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
            'actividad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        try {
            DB::beginTransaction();

            $company = new Company();
            $company->fantasy_name = $request->nombre_fantasia;
            $company->real_name = $request->razon_social;
            $company->document_number = $request->ruc;
            $company->email = Str::lower($request->email);
            $company->phone_number = 0 . $request->telefono;
            $company->country = $request->pais;
            $company->city = $request->ciudad;
            $company->activity = $request->actividad;
            $company->address = $request->direccion;

            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $path = 'public/company';
            // Crear el path si no existe
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
            $filename = 'logo-' . Str::lower(str_replace(' ', '-', $company->real_name)) . '-' . Carbon::now()->format('dmYHis') . '.' . $extension;
            Storage::putFileAs($path . '/', $file, $filename);

            $company->logo = str_replace('public', 'storage', $path) . '/' . $filename;
            $company->save();

            DB::commit();

            return redirect()->route('company.show')->with('success', 'El registro ha sido creado correctamente.');
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
        // $this->authorize('company.edit');

        try {
            DB::beginTransaction();

            $company = Company::findOrFail($id);

            return view('company.edit')->with(compact('company'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador');
        }
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('company.edit');

        $this->validate($request, [
            'nombre_fantasia' => ['required', 'string', 'max:255'],
            'razon_social' => ['required', 'string', 'max:255'],
            'ruc' => ['required', 'string', 'regex:/^\d+-\d$/'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'digits_between:8,9'],
            'pais' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
            'actividad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
        ]);

        try {
            DB::beginTransaction();

            $company = Company::findOrFail($id);
            $company->fantasy_name = $request->nombre_fantasia;
            $company->real_name = $request->razon_social;
            $company->document_number = $request->ruc;
            $company->email = Str::lower($request->email);
            $company->phone_number = 0 . $request->telefono;
            $company->country = $request->pais;
            $company->city = $request->ciudad;
            $company->activity = $request->actividad;
            $company->address = $request->direccion;

            if ($request->logo) {
                Storage::disk('public')->delete(str_replace('storage/', '', $company->logo));

                $file = $request->logo;
                $extension = $file->getClientOriginalExtension();
                $path = 'public/company';
                // Crear el path si no existe
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true);
                }
                $filename = 'logo-' . Str::lower(str_replace(' ', '-', $company->real_name)) . '-' . Carbon::now()->format('dmYHis') . '.' . $extension;
                Storage::putFileAs($path . '/', $file, $filename);

                $company->logo = str_replace('public', 'storage', $path) . '/' . $filename;
            }
            $company->save();

            DB::commit();

            return redirect()->route('company.show', $company->id)->with('success', 'El registro ha sido actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return response()->json([
                'message' => 'No se puede actualizar el registro. Contacte con el administrador',
                'type' => 'error',
            ]);
        }
    }
}
