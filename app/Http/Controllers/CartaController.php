<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use Illuminate\Validation\Rule;


class CartaController extends Controller
{
    public function __construct()
    {
        // Middleware para permitir el acceso a solo los usuarios autorizados y con role admin
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Función que devolverá una vista donde aparecerán todas las cartas del juego
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtengo todas las cartas
        $cartas = Carta::all();

        // Retorno la vista de getionar las cartas
        return view('cartas.index', compact('cartas'));
    }

    /**
     * Muestra formulario para añadir carta.
     *
     * @return \Illuminate\View\View
     */
    public function crear_carta_form()
    {
        // Retorno la vista de getionar las cartas
        return view('cartas.crear_carta');
    }

    /**
     * Añade la carta a la bbdd.
     *
     * @return \Illuminate\View\View
     */
    public function crear_carta(Request $request)
    {
        // Obtiene el archivo
        $photoFile = $request->file('photo');

        // Valida los datos del formulario
        $request->validate([
            'photo' => [
                'required',
                'image',
                'mimes:jpeg,png,webp',
                Rule::unique('cartas', 'photo'),
            ],
            'nombre' => ['required', 'string', 'max:40', Rule::unique('cartas', 'nombre')],
            'role' => ['required', 'string'],
            'coste_elixir' => ['required', 'min:0', 'max:10'],
        ], [
            'photo.required' => 'Por favor selecciona una foto para la carta.',
            'photo.image' => 'El archivo debe ser una imagen.',
            'photo.mimes' => 'La foto debe ser de tipo JPG, PNG o WebP.',
            'photo.unique' => 'La nueva imagen debe ser diferente a la actual.',
            // Resto de las reglas de validación...
        ]);

        // Almacena la imagen en public/images con el nombre original
        $photoFile->move(public_path('images'), $photoFile->getClientOriginalName());

        // Actualiza la carta con los datos nuevos
        $carta = new Carta();
        $carta->photo = $photoFile->getClientOriginalName();
        $carta->nombre = $request->nombre;
        $carta->role = $request->role;
        $carta->coste_elixir = $request->coste_elixir;

        // Guarda los cambios en la carta
        $carta->save();

        // Retorno la vista de gestionar las cartas
        return redirect()->route('cartas');
    }

    /**
     * Muestra formulario para editar carta que se selecciona en concreto.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Carta $carta)
    {
        // Retorno el formulario con la carta que se indica
        return view('cartas.editar_carta', compact('carta'));
    }

    /**
     * Actualiza los datos de la carta en la base de datos
     *
     * @return \Illuminate\View\View
     */
    public function actualizar_carta(Request $request, Carta $carta)
    {
        // Obtiene el archivo
        $photoFile = $request->file('photo');

        // Valida los datos del formulario
        $request->validate([
            'photo' => [
                'required',
                'nullable',
                'image',
                'mimes:jpeg,png,webp',
                Rule::unique('cartas', 'photo')->ignore($carta->id),
            ],
            'nombre' => ['required', 'string', 'max:40', Rule::unique('cartas', 'nombre')->ignore($carta->id)],
            'role' => ['required', 'string'],
            'coste_elixir' => ['required', 'min:0', 'max:10'],
        ], [
            'photo.required' => 'Por favor selecciona una foto para la carta.',
            'photo.image' => 'El archivo debe ser una imagen.',
            'photo.mimes' => 'La foto debe ser de tipo JPG, PNG o WebP.',
            'photo.unique' => 'La nueva imagen debe ser diferente a la actual.',
            // Resto de las reglas de validación...
        ]);

        // Almacena la imagen en public/images con el nombre original
        $photoFile->move(public_path('images'), $photoFile->getClientOriginalName());

        // Actualiza la carta con los datos nuevos
        $carta->photo = $photoFile->getClientOriginalName();
        $carta->nombre = $request->nombre;
        $carta->role = $request->role;
        $carta->coste_elixir = $request->coste_elixir;

        // Guarda los cambios en la carta
        $carta->save();

        // Retorno la vista de gestionar las cartas
        return redirect()->route('cartas');
    }


    /**
     * Añade los datos actualizados de la carta a la base de datos
     *
     * @return \Illuminate\View\View
     */
    public function eliminar_carta(Carta $carta)
    {
        // Elimino la carta que se ha indicado
        $carta->delete();

        // Redirecciona después de eliminar
        return redirect()->back();
    }
}
