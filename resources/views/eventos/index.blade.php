@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\eventos.css') }}">
@endsection

@section('content')
    <div class="container-fluid" style="padding: 110px 0px 20px">
        <div class="row m-0 justify-content-between">
            <div class="d-flex justify-content-center">
                <div class="col-9 eventos me-5">
                    <h1>
                        EVENTOS
                    </h1>
                    <div class="d-flex flex-wrap">

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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-stopwatch-fill"
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
                                                <div class="rounded-pill p-1" style="background-color: rgb(35, 114, 224)">
                                                    <span>{{ $evento['tipo'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <button
                                            class="btn-hover color-6 col-4 btn rounded-pill text-white fw-bold btn-success">Inscribirse</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-3 eventos-box text-center ms-5">
                    <a href="{{ route('crear_evento_form') }}" style="text-decoration: none; color: inherit;">
                        <h2>CREAR
                            EVENTO</h2>
                    </a>
                    <a href="{{ route('mis_eventos') }}" style="text-decoration: none; color: inherit;">
                        <h2>MIS
                            EVENTOS</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
