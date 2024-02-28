<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // use Notifiable;

    /**
     * Muestra la lista de usuarios ordenados por partidas ganadas.
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $rankings = User::all()->sortByDesc('partidas_ganadas');
        return view('rankings.index', compact('rankings'));
    }

    /**
     * Busca un usuario por su nombre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'exists:users,name'],
        ], [
            'name.required' => 'El campo jugador es obligatorio',
            'name.exists' => 'El jugador no existe',
        ]);

        $name = $request->input('name');

        $rankings = User::where('name', $name)->get();

        return view('rankings.index', compact('rankings'));
    }

    public function perfil() {
        return view('auth.perfil');
    }

    /**
     * Actualiza el nombre del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateName(Request $request, User $usuario)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Actualizar el nombre del usuario
        $usuario->update([
            'name' => $request->input('name'),
            'password' => $request->input('name'), // Se actualiza también la contraseña por simplicidad (no recomendado en producción)
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('perfil')->with('success', 'Nombre actualizado correctamente');
    }

    /**
     * Actualiza el correo electrónico del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmail(Request $request, User $usuario)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
        ]);

        // Actualizar el correo electrónico del usuario
        $usuario->update([
            'email' => $request->input('email'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('perfil')->with('success', 'Correo electrónico actualizado correctamente');
    }

    /**
     * Elimina la cuenta del usuario y cierra sesión.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eliminarCuenta(User $usuario)
    {
        // Llamar al método delete() para eliminar el usuario
        $usuario->delete();

        // Desconectar al usuario autenticado
        Auth::logout();

        return redirect()->route('index');
    }
}
