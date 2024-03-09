@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\eventos.css') }}">
@endsection
@section('content')
    <div class="container-fluid" style="padding: 110px 0px 20px">
        <div class="row m-0 justify-content-between">
            <div class="d-flex justify-content-center">
                <div class="col-9 eventos">
                    <div class="row">
                        <h1 class="text-center">
                            MIS EVENTOS
                        </h1>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        @if (count($eventos) == 0)
                            <h2 class="text-white">Todavía no tienes ningún evento creado</h2>
                        @else
                            @foreach ($eventos as $evento)
                                <div class="evento-container col-4 p-3 position-relative">
                                    <div class="rounded-5 p-4"
                                        style="background-image: url('{{ asset('images/' . $evento['tipo'] . '.webp') }}'); background-size: cover;
                                background-position: 50% 50%; opacity: 0.9; min-height: 236px">
                                        <div class="row">
                                            <div class="col">
                                                <h2 class="text-white"
                                                    style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;  text-shadow: 0px 0px 15px rgb(0, 0, 0), 0px 0px 15px rgb(0, 0, 0), 0px 0px 15px rgb(0, 0, 0);">
                                                    {{ $evento['nombre'] }}</h2>
                                            </div>
                                        </div>
                                        <div class="row text-white fw-bold text-center mb-2">
                                            <div class="col-9 d-flex justify-content-between">
                                                <div class="col-3 p-0">
                                                    <div class="rounded-pill p-1 d-flex align-items-center justify-content-center"
                                                        style="background-color: rgb(254, 6, 6)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-person-circle"
                                                            viewBox="0 0 16 16">
                                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                            <path fill-rule="evenodd"
                                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                        </svg>
                                                        <span class="ms-1">{{ $evento['numero_participantes'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-5 p-0">
                                                    <div class="rounded-pill p-1 d-flex align-items-center justify-content-center"
                                                        style="background-color: rgb(185, 50, 185)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-calendar-date"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.445 11.688V6.354h-.633A13 13 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                        </svg>
                                                        <?php
                                                        $fecha_objeto = DateTime::createFromFormat('d/m/Y H:i', $evento['fecha_inicio']);

                                                        if ($fecha_objeto !== false) {
                                                            // Imprime la fecha sin el año
                                                            echo "<span class='ms-1'>" . $fecha_objeto->format('d/m H:i') . '</span>';
                                                        } else {
                                                            echo 'Error al crear el objeto DateTime desde la cadena de fecha.';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-0">
                                                    <div class="rounded-pill p-1 d-flex align-items-center justify-content-center"
                                                        style="background-color: rgb(215, 101, 25)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-stopwatch-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 0a.5.5 0 0 0 0 1H7v1.07A7.001 7.001 0 0 0 8 16a7 7 0 0 0 5.29-11.584l.013-.012.354-.354.353.354a.5.5 0 1 0 .707-.707l-1.414-1.415a.5.5 0 1 0-.707.707l.354.354-.354.354-.012.012A6.97 6.97 0 0 0 9 2.071V1h.5a.5.5 0 0 0 0-1zm2 5.6V9a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1h3V5.6a.5.5 0 1 1 1 0" />
                                                        </svg>
                                                        <span>{{ $evento['duracion'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-white fw-bold text-center">
                                            <div class="col-8">
                                                <div class="col-3">
                                                    <div class="rounded-pill p-1"
                                                        style="background-color: rgb(35, 114, 224)">
                                                        <span>{{ $evento['tipo'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overlay d-flex d-none position-absolute top-0 start-0 w-100 h-100 align-items-center justify-content-center rounded-5"
                                        style="background-color: rgba(126, 126, 126, 0.5);">
                                        <form action="{{ route('eventos.destroy', $evento['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger me-3"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></button>
                                        </form>

                                        <form action="{{ route('eventos.edit', $evento['id']) }}" method="GET">
                                            @csrf
                                            @method('GET')

                                            <button type="submit" class="btn btn-success ms-3"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var eventoContainers = document.querySelectorAll('.evento-container');

            eventoContainers.forEach(element => {
                element.addEventListener('mouseover', function() {
                    element.querySelector('.overlay').classList.toggle('d-none', false);
                    element.querySelector('.overlay').classList.toggle('d-block', true);
                });

                element.addEventListener('mouseout', function() {
                    element.querySelector('.overlay').classList.toggle('d-none', true);
                    element.querySelector('.overlay').classList.toggle('d-block', false);
                });
            });
        });
    </script>
@endsection
