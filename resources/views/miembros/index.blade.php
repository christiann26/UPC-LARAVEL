@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\adminmembers.css') }}">
@endsection
@section('content')
    <?php $posicion = 0; ?>
    <div class="container-fluid" style="padding: 70px 0px 44px">
        <div class="row justify-content-between m-0">
            <div class="col-1"></div>
            <div class="col-12 miembros">
                <h1 class="p-0">
                    MIEMBROS
                </h1>
                <table class="table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Website</th>
                            <th scope="col">Email</th>
                            <th scope="col">Linkedin</th>
                            <th scope="col">Dribble</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($miembros as $miembro)
                            <?php $posicion++; ?>
                            <tr>
                                <form action="{{ route('actualizar-miembro', $miembro->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <th scope="row">{{ $posicion }}</th>
                                    <td>
                                        <img src="{{ asset('images/' . $miembro['photo']) }}"
                                            alt="Carta {{ $miembro['name'] }}" class="rounded-circle" width="100px"
                                            height="100%">
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="name[{{ $miembro->id }}]"
                                            value="{{ old('name.' . $miembro->id, $miembro->name) }}">
                                        @error('name.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="role[{{ $miembro->id }}]"
                                            value="{{ old('role.' . $miembro->id, $miembro->role) }}">
                                        @error('role.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="desc[{{ $miembro->id }}]"
                                            value="{{ old('desc.' . $miembro->id, $miembro->desc) }}">
                                        @error('desc.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="d-none">
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="photo[{{ $miembro->id }}]"
                                            value="{{ old('photo.' . $miembro->id, $miembro->photo) }}">
                                        @error('photo.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="website[{{ $miembro->id }}]"
                                            value="{{ old('website.' . $miembro->id, $miembro->website) }}">
                                        @error('website.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="email[{{ $miembro->id }}]"
                                            value="{{ old('email.' . $miembro->id, $miembro->email) }}">
                                        @error('email.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="linkedin[{{ $miembro->id }}]"
                                            value="{{ old('linkedin.' . $miembro->id, $miembro->linkedin) }}">
                                        @error('linkedin.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" style="color:white;" class="form-control bg-danger"
                                            name="dribbble[{{ $miembro->id }}]"
                                            value="{{ old('dribbble.' . $miembro->id, $miembro->dribbble) }}">
                                        @error('dribbble.' . $miembro->id)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success">Editar</button>
                                    </td>
                                </form>
                                <td>
                                    <form action="{{ route('eliminar-miembro', $miembro->id) }}" method="post">
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
        </div>
    </div>
@endsection
