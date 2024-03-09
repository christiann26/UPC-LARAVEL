@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\adminusers.css') }}">
@endsection
@section('content')
    <?php $posicion = 0; ?>
    <div class="container-fluid" style="padding: 110px 0px 44px">
        <div class="row justify-content-between m-0">
            <div class="col-1"></div>
            <div class="col-8 usuarios">
                <h1 class="p-0">
                    USUARIOS
                </h1>
                <table class="table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <?php $posicion++; ?>
                            <tr>
                                <form action="{{ route('actualizar-usuario', $usuario->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <th scope="row">{{ $posicion }}</th>
                                    <!-- Nombre -->
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="name[{{ $usuario->id }}]"
                                            value="{{ old('name.' . $usuario->id, $usuario->name) }}">

                                        @error('name.' . $usuario->id)
                                            <div class="text-white">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <!-- Email -->
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="email[{{ $usuario->id }}]"
                                            value="{{ old('email.' . $usuario->id, $usuario->email) }}">

                                        @error('email.' . $usuario->id)
                                            <div class="text-white">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <!-- Password -->
                                    <td>
                                        <input type="password" style="color:white;" class="form-control bg-danger"
                                            name="password[{{ $usuario->id }}]"
                                            value="{{ old('password.' . $usuario->id, $usuario->password) }}">

                                        @error('password.' . $usuario->id)
                                            <div class="text-white">{{ $message }}</div>
                                        @enderror
                                    </td>

                                    <td>
                                        <button type="submit" class="btn btn-success">Editar</button>
                                    </td>
                                </form>

                                <td>
                                    <form action="{{ route('eliminar-usuario', $usuario->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-2 filtros">
                <div class="row">
                    <div class="col p-0">
                        <h2 class="p-0">
                            FILTRAR
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-0">
                        <form action="{{ route('buscar_usuario') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="text-white">Por jugador</label>
                                <input id="name" type="text" placeholder="Jugador" name="name"
                                    class="form-control">

                                <div class="mt-2 text-center">
                                    <button type="submit" class="btn p-1 text-light" style="background-color: #ff0000">
                                        Buscar
                                    </button>
                                    @error('name')
                                        <div class="text-white" style="color:white;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection
