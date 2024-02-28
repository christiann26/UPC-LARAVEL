@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\ranking.css') }}">
@endsection
@section('content')
    <?php $posicion = 0; ?>
    <div class="container" style="padding: 110px 0px 44px">
        <div class="row justify-content-between">
            <div class="col-8 ranking">
                <h1 class="p-0">
                    RANKING
                </h1>
                <table class="table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Posición</th>
                            <th scope="col">Jugador</th>
                            <th scope="col">Partidas Jugadas</th>
                            <th scope="col">Ganadas</th>
                            <th scope="col">Empatadas</th>
                            <th scope="col">Perdidas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankings as $ranking)
                            <?php $posicion++; ?>
                            <tr>
                                <th scope="row">{{ $posicion }}</th>
                                <td>{{ $ranking['name'] }}</td>
                                <td>{{ $ranking['partidas_jugadas'] }}</td>
                                <td>{{ $ranking['partidas_ganadas'] }}</td>
                                <td>{{ $ranking['partidas_empatadas'] }}</td>
                                <td>{{ $ranking['partidas_perdidas'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4 filtros">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col p-0">
                            <h2 class="p-0">
                                FILTRAR
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <form action="{{ route('search_user') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-white">Por jugador</label>
                                    <input id="name" type="text" placeholder="Jugador" name="name"
                                        class="form-control">

                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn p-1 text-light" style="background-color: #FF00FB">
                                            Buscar
                                        </button>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
