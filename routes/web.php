<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/', [WelcomeController::class, 'index'])->name('index');

// Ruta para mostrar los eventos del usuario autenticado
Route::get('/mis_eventos', [EventoController::class, 'mis_eventos'])->name('mis_eventos');

Route::get('/eventos_inscritos', [EventoController::class, 'eventos_inscritos'])->name('eventos_inscritos');

// Ruta para mostrar todos los eventos y crear nuevos eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
// Ruta para mostrar el formulario de creación de eventos
Route::get('/crear_evento_form', [EventoController::class, 'crear_evento_form'])->name('crear_evento_form');
// Ruta para guardar un nuevo evento
Route::post('/crear_evento', [EventoController::class, 'crear_evento'])->name('crear_evento');
// Ruta para eliminar un evento existente
Route::delete('/eventos/{evento}/delete', [EventoController::class, 'destroy'])->name('eventos.destroy');
// Ruta para desuscribirse eventos
Route::delete('/eventos/{evento}/desuscribirse', [EventoController::class, 'desuscribirse'])->name('eventos.desuscribirse');
// Ruta para inscribirse a eventos
Route::post('/eventos/{evento}/inscribirse', [EventoController::class, 'inscribirse'])->name('eventos_inscribirse');
// Ruta para editar un evento existente
Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
// Ruta para actualizar un evento existente
Route::post('/eventos/{evento}/edit', [EventoController::class, 'actualizar_evento'])->name('eventos.actualizar');


// Rutas para manejar los rankings
Route::get('/rankings', [UserController::class, 'list'])->name('rankings');
Route::post('/rankings', [UserController::class, 'search_user'])->name('search_user');

// Ruta para mostrar el perfil del usuario
Route::get('/perfil', [UserController::class, 'perfil'])->middleware('auth')->name('perfil');

// Ruta para actualizar el nombre de usuario
Route::put('/usuarios/{usuario}/actualizar-nombre', [UserController::class, 'updateName'])->name('usuarios.actualizar-nombre');

// Ruta para actualizar el correo electrónico del usuario
Route::put('/usuarios/{usuario}/actualizar-correo', [UserController::class, 'updateEmail'])->name('usuarios.actualizar-correo');

// Ruta para eliminar un usuario
Route::delete('/usuarios/{usuario}/eliminar-cuenta', [UserController::class, 'eliminarCuenta'])->name('eliminar-cuenta');

// Ruta para listar todas las cartas
Route::get('/cartas', [CartaController::class, 'index'])->name('cartas');
// Ruta para acceder al formulario de crear cartas
Route::get('/crea_carta_form', [CartaController::class, 'crear_carta_form'])->name('carta.crear_form');
// Ruta para añadir la carta a la bbdd
Route::post('/crear_carta', [CartaController::class, 'crear_carta'])->name('carta.crear');
// Ruta para editar la carta seleccionada
Route::get('/carta/{carta}/edit', [CartaController::class, 'edit'])->name('carta.edit');
// Ruta para actualizar un evento
Route::post('/carta/{carta}/edit', [CartaController::class, 'actualizar_carta'])->name('carta.actualizar');
// Ruta para eliminar una carta
Route::delete('/carta/{carta}/delete', [CartaController::class, 'eliminar_carta'])->name('carta.eliminar');



// Ruta para listar todos los usuarios solamente, accesible para usuarios autorizados y con rol admin
Route::get('/usuarios', [UserController::class, 'list_users'])->middleware(['auth', 'role:admin'])->name('usuarios');
// Ruta para eliminar los usuarios solamente, accesible para usuarios autorizados y con rol admin
Route::delete('/usuarios/{usuario}/eliminar-usuario', [UserController::class, 'eliminarUsuario'])->middleware(['auth', 'role:admin'])->name('eliminar-usuario');
// Ruta para editar los usuarios solamente, accesible para usuarios autorizados y con rol admin
Route::put('/usuarios/{usuario}/actualizar-usuario', [UserController::class, 'actualizarUsuario'])->middleware(['auth', 'role:admin'])->name('actualizar-usuario');
// Ruta para buscar usuarios, accesible para usuarios autorizados y conrol admin
Route::post('/usuarios', [UserController::class, 'buscar_usuario'])->middleware(['auth', 'role:admin'])->name('buscar_usuario');


// Ruta para listar todos los miembros solamente, accesible para usuarios autorizados y con rol admin
Route::get('/miembros', [MemberController::class, 'list'])->middleware(['auth', 'role:admin'])->name('miembros');
// Ruta para eliminar los miembros solamente, accesible para usuarios autorizados y con rol admin
Route::delete('/miembros/{miembro}/eliminar-miembro', [MemberController::class, 'eliminarMiembro'])->middleware(['auth', 'role:admin'])->name('eliminar-miembro');
// Ruta para editar los miembros solamente, accesible para usuarios autorizados y con rol admin
Route::put('/miembros/{miembro}/actualizar-miembro', [MemberController::class, 'actualizarMiembro'])->middleware(['auth', 'role:admin'])->name('actualizar-miembro');

