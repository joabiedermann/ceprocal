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

use App\Models\Forum;
use App\Models\ForumStudent;

class ForumController extends Controller
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
        $this->authorize('forums.show');

        try {
            DB::beginTransaction();

            $forums = Forum::orderBy('created_at', 'desc')->get();

            return view('forums.index')->with(compact('forums'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'La página no puede ser mostrada. Contacte con el administrador.');
        }
    }

    
    public function show($id)
    {
        $this->authorize('forums.show');

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);
            switch ($forum->status) {
                case 0:
                    $forum->status_text = 'Inactivo';
                    break;
                default:
                    $forum->status_text = 'Activo';
                    break;
            }
            $forum->date = Carbon::parse($forum->date)->format('d/m/Y');
            switch ($forum->hours) {
                case 1:
                    $forum->text_hours = 'hora';
                    break;
                default:
                    $forum->text_hours = 'horas';
                    break;
            }

            return view('forums.show')->with(compact('forum'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }
    
    public function edit($id)
    {
        $this->authorize('forums.edit');

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);

            return view('forums.edit')->with(compact('forum'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'No se puede obtener el registro. Contacte con el administrador.');
        }
    }

    public function update(Request $request, $id)
    {
        $this->authorize('forums.edit');

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'horas' => ['required', 'numeric', 'min:1', 'digits_between:1,3'],
            'estado' => ['required', Rule::in([0, 1])],
        ]);

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);
            $forum->name = $request->nombre;
            $forum->date = $request->fecha;
            $forum->hours = $request->horas;
            $forum->status = $request->estado;
            $forum->save();

            DB::commit();

            return redirect()->route('forums.index')->with('success', 'El foro ' . $forum->name . ' ha sido actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            return redirect()->route('forums.index')->with('success', 'No se puede actualizar el registro. Contacte con el administrador');
        }
    }

    
    public function get_status($id)
    {
        $this->authorize('forums.edit_status');

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);

            return response()->json([
                'forum' => $forum,
                'message' => '¿Está seguro de actualizar el estado del foro ' . $forum->name . '?',
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
        $this->authorize('forums.edit_status');

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);
            switch ($forum->status) {
                case 0:
                    $forum->status = 1;
                    $tipo = 'activado';
                    break;
                default:
                    $forum->status = 0;
                    $tipo = 'inactivado';
                    break;
            }
            $forum->save();

            DB::commit();

            return response()->json([
                'message' => 'El foro ' . $forum->name . ' ha sido ' . $tipo . ' correctamente.',
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
        $this->authorize('forums.destroy');

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);

            return response()->json([
                'forum' => $forum,
                'message' => '¿Está seguro de eliminar el foro ' . $forum->name . '?',
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
        $this->authorize('forums.destroy');

        try {
            DB::beginTransaction();

            $forum = Forum::findOrFail($id);
            ForumStudent::where('forum_id', $forum->id)->delete();
            $forum->delete();

            DB::commit();

            return response()->json([
                'message' => 'El foro ' . $forum->name . ' ha sido eliminado correctamente.',
                'type' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());
            if (stripos($e->getMessage(), 'Integrity constraint violation')) {
                return response()->json([
                    'message' => 'No se puede completar la eliminación. El foro está siendo utilizado por otro registro dentro del sistema.',
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
