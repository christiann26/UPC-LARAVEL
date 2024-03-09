<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EventoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware de autenticación requerido para acceder a las rutas de este controlador
        $this->middleware('auth');
    }

    /**
     * Muestra todos los eventos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtiene todos los eventos
        $eventos = Evento::all();

        // Retorna la vista con los eventos
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Muestra los eventos del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function mis_eventos()
    {
        // Busca al usuario autenticado
        $eventos = Evento::where('user_id', Auth::id())->get();

        // Si el usuario existe, obtiene sus eventos
        if ($eventos) {
            return view('eventos.mis-eventos', compact('eventos'));
        } else {
            // Si el usuario no existe, muestra un mensaje de error
            return "Usuario no encontrado";
        }
    }
    public function eventos_inscritos()
    {
        // Busca al usuario autenticado
        $usuario = User::find(Auth::user()->id);

        // Si el usuario existe, obtiene sus eventos
        if ($usuario) {
            $eventos = $usuario->eventos;
            return view('eventos.eventos-inscritos', compact('eventos'));
        } else {
            // Si el usuario no existe, muestra un mensaje de error
            return "Usuario no encontrado";
        }
    }
    /**
     * Muestra el formulario para crear un nuevo evento.
     *
     * @return \Illuminate\View\View
     */
    public function crear_evento_form()
    {
        // Retorna la vista del formulario de creación de evento
        return view('eventos.crear-evento');
    }

    /**
     * Guarda un nuevo evento creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function crear_evento(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'tipo' => ['required', 'string'],
            'fecha_inicio' => ['required', 'date_format:d/m/Y\ H:i'],
            'duracion' => ['required', 'string'],
        ]);

        // Crea un nuevo evento con los datos del formulario
        $evento = new Evento();
        $evento->user_id = Auth::user()->id;
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->duracion = $request->duracion;

        // Guarda el evento en la base de datos
        $evento->save();

        // Asocia el evento al usuario autenticado
        $evento->usuarios()->attach(Auth::user()->id);

        // Redirecciona después de crear el evento
        return redirect()->route('mis_eventos');
    }

    /**
     * Muestra el formulario para editar un evento existente.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\View\View
     */
    public function edit(Evento $evento)
    {
        // Retorna la vista del formulario de edición de evento con los datos del evento
        return view('eventos.editar-evento', compact('evento'));
    }

    /**
     * Actualiza un evento existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actualizar_evento(Request $request, Evento $evento)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'tipo' => ['required', 'string'],
            'fecha_inicio' => ['required', 'date_format:d/m/Y\ H:i'],
            'duracion' => ['required', 'string'],
        ]);

        // Actualiza el evento con los datos del formulario
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->duracion = $request->duracion;

        // Guarda los cambios en el evento
        $evento->update();

        // Redirecciona después de actualizar el evento
        return redirect()->route('eventos');
    }

    /**
     * Elimina un evento.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

        // Redirecciona después de eliminar el evento
        return redirect()->back();
    }
    /**
     * Desuscribe al usuario autenticado del evento especificado.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function desuscribirse(Evento $evento)
    {
        // Obtiene al usuario autenticado
        $usuario = Auth::user();

        // Verifica si el usuario está inscrito en el evento
        if ($evento->usuarios()->where('user_id', $usuario->id)->exists()) {
            // Desasocia al usuario del evento
            $evento->usuarios()->detach($usuario->id);

            // Redirecciona después de desuscribirse
            return redirect()->route('eventos_inscritos')->with('success', 'Te has desuscrito del evento correctamente.');
        } else {
            // Redirecciona con un mensaje de error si el usuario no está inscrito en el evento
            return redirect()->route('eventos_inscritos')->with('error', 'No estás inscrito en este evento.');
        }
    }

    /**
     * Inscribir al usuario autenticado en un evento especificado.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inscribirse(Evento $evento)
    {
        // Obtiene al usuario autenticado
        $usuario = Auth::user();

        // Verifica si el usuario ya está inscrito en el evento
        if ($evento->usuarios()->where('user_id', $usuario->id)->exists()) {
            // Redirecciona con un mensaje de error si el usuario ya está inscrito en el evento
            return redirect()->route('eventos')->with('error', 'Ya estás inscrito en este evento.');
        } else {
            // Asocia al usuario con el evento
            $evento->usuarios()->attach($usuario->id);

            // Redirecciona después de inscribirse
            return redirect()->route('eventos_inscritos')->with('success', 'Te has inscrito en el evento correctamente.');
        }
    }
}
