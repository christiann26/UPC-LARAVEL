@extends('layouts.app')
@section('estilos')
    <style>
        body,
        html,
        main {
            height: 100%;
            background-color: #212529;
        }
    </style>
@endsection
@section('name')
    {{-- Formulario con los datos del usuario --}}
@section('content')

    <div class="container-fluid"style="padding: 110px 0px 20px">
        <div class="container">
            <div class="mt-3">
                <h1>Mi usuario</h1>
                <form action="" method="post">
                    <div class="card mb-4" style="background-color: black; color: white; border-color: white;">
                        <div class="form-group mt-2">
                            <div class="card-header">
                                <label for="name"><b>Nombre usuario:</b></label>
                                <button type="button" class="btn btn-secondary btn-block float-end" style="width: 125px;"
                                    data-bs-toggle="modal" data-bs-target="#editarNombreModal">Editar</button>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background-color: black; color: white; border-color: white;">
                        <div class="form-group mt-2">
                            <div class="card-header">
                                <label for="name"><b>Correo electrónico:</b></label>
                                <button type="button" class="btn btn-secondary btn-block float-end" style="width: 125px;"
                                    data-toggle="modal" data-target="#editarCorreoModal" data-bs-toggle="modal"
                                    data-bs-target="#editarCorreoModal">Editar</button>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>


                </form>
            </div>

            <div class="mt-5 mb-5 text-danger">
                <h3>Eliminar cuenta</h3>
                <hr>
                <p>Si eliminas la cuenta no habrá vuelta a atrás.</p>
                <form action="{{ route('eliminar-cuenta', Auth::user()->id) }}" method="Post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </div>

            <!-- MODAL ACTUALIZAR NOMBRE -->

            <div class="modal fade" id="editarNombreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Nombre de Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('usuarios.actualizar-nombre', Auth::user()->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nombreUsuario">Nuevo nombre de usuario:</label>
                                    <input type="text" class="form-control" id="nombreUsuario" name="name"
                                        value="{{ Auth::user()->name }}">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL ACTUAIZAR EMAIL -->

            <div class="modal fade" id="editarCorreoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Correo Electrónico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('usuarios.actualizar-correo', Auth::user()->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="correoElectronico">Nuevo Correo Electrónico:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <br>

                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
