@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\admin_cartas.css') }}">
@endsection

@section('content')
    <div class="container-fluid" style="padding: 110px 0px 20px">
        <div class="row mb-3 m-0 justify-content-center">
            <div class="col-2">
                <h1 class="p-0 text-center fw-bold">CARTAS</h1>
            </div>
        </div>
        <div class="row m-0 justify-content-center mb-5">
            <div class="col-1">
                <form action="{{ route('carta.crear_form') }}" method="GET">
                    <button class="btn text-white fw-bold fs-5 w-100" style="background-image: linear-gradient(to right, #926a44 10%, #603813  100%)">Crear carta</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center m-0">
            @foreach ($cartas as $carta)
                <div class="evento-container position-relative col-1 p-0 mx-2 mb-3">
                    <img src="{{ asset('images/' . $carta['photo']) }}" alt="Carta {{ $carta['name'] }}"
                        class="rounded col-12" height="260">
                    <div class="overlay d-flex d-none position-absolute top-0 start-0 w-100 h-100 align-items-center justify-content-center rounded-2"
                        style="background-color: rgba(126, 126, 126, 0.615);">
                        <form action="{{ route('carta.eliminar', $carta['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger me-1"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="40" height="40" fill="currentColor" class="bi bi-trash"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></button>
                        </form>

                        <form action="{{ route('carta.edit', $carta['id']) }}" method="GET">
                            @csrf
                            @method('GET')

                            <button type="submit" class="btn btn-success ms-1"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="40" height="40" fill="currentColor" class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button>
                        </form>
                    </div>
                </div>
            @endforeach
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
