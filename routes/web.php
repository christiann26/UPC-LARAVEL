<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por RouteServiceProvider y todas ellas serán asignadas
| al grupo de middleware "web". ¡Haz algo genial!
|
*/

// Rutas de autenticación
Auth::routes();

// Ruta de la página de inicio
Route::get('/', function () {
    $datos = range(0, 29); // Genera un array del 0 al 29
    return view('welcome', ['datos' => $datos]);
})->name('index');

// Ruta para mostrar los eventos del usuario autenticado
Route::get('/mis_eventos', [EventoController::class, 'mis_eventos'])->name('mis_eventos');
// Ruta para mostrar todos los eventos y crear nuevos eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
// Ruta para mostrar el formulario de creación de eventos
Route::get('/crear_evento_form', [EventoController::class, 'crear_evento_form'])->name('crear_evento_form');
// Ruta para guardar un nuevo evento
Route::post('/crear_evento', [EventoController::class, 'crear_evento'])->name('crear_evento');
// Ruta para eliminar un evento existente
Route::delete('/eventos/{evento}/delete', [EventoController::class, 'destroy'])->name('eventos.destroy');
// Ruta para editar un evento existente
Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
// Ruta para actualizar un evento existente
Route::post('/eventos/{evento}/edit', [EventoController::class, 'actualizar_evento'])->name('eventos.actualizar');

// Rutas para manejar los rankings
Route::get('/rankings', [UserController::class, 'list'])->name('rankings');
Route::post('/search_user', [UserController::class, 'search_user'])->name('search_user');

// Ruta para mostrar el perfil del usuario
Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');

// Ruta para actualizar el nombre de usuario
Route::put('/usuarios/{usuario}/actualizar-nombre', [UserController::class, 'updateName'])->name('usuarios.actualizar-nombre');

// Ruta para actualizar el correo electrónico del usuario
Route::put('/usuarios/{usuario}/actualizar-correo', [UserController::class, 'updateEmail'])->name('usuarios.actualizar-correo');

// Ruta para eliminar un usuario
Route::delete('/usuarios/{usuario}/eliminar-cuenta', [UserController::class, 'eliminarCuenta'])->name('eliminar-cuenta');
