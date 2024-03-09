<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function list()
    {
        $miembros = Member::all();
        return view('miembros.index', compact('miembros'));
    }


    public function eliminarMiembro(Member $miembro)
    {
        // Llamar al método delete() para eliminar el usuario
        $miembro->delete();

        return redirect()->route('miembros');
    }

    /**
     * Actualiza la información de un miembro en la base de datos.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @param \App\Models\Member $miembro El miembro a actualizar.
     * @return \Illuminate\Http\RedirectResponse Redirige al usuario después de la actualización.
     */
    public function actualizarMiembro(Request $request, Member $miembro)
    {
        $request->validate([
            'name.' . $miembro->id => 'required|string|max:255',
            'role.' . $miembro->id => 'required|string|max:255',
            'desc.' . $miembro->id => 'required|string',
            'photo.' . $miembro->id => 'required|string',
            'website.' . $miembro->id => 'required|string|url',
            'email.' . $miembro->id => [
                'required',
                'string',
                'max:255',
                'email',
                Rule::unique('members', 'email')->ignore($miembro->id),
            ],
            'linkedin.' . $miembro->id => 'nullable|string|url',
            'dribbble.' . $miembro->id => 'nullable|string|url',
        ]);

        // Se actualiza el miembro con la información proporcionada en la solicitud.
        $miembro->update([
            'name' => $request->input('name.' . $miembro->id),
            'role' => $request->input('role.' . $miembro->id),
            'desc' => $request->input('desc.' . $miembro->id),
            'photo' => $request->input('photo.' . $miembro->id),
            'website' => $request->input('website.' . $miembro->id),
            'email' => $request->input('email.' . $miembro->id),
            'linkedin' => $request->input('linkedin.' . $miembro->id),
            'dribbble' => $request->input('dribbble.' . $miembro->id),
        ]);

        // Se redirige al usuario después de la actualización.
        return redirect()->route('miembros');
    }
}
