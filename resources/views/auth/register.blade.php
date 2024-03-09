@extends('layouts.app')

@section('estilos')
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css\registro.css') }}">
@endsection

@section('content')
    <div class="page-wrapper fondoGif p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">{{ __('REGISTRO') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group">
                            <input id="name" type="text" class="input--style-3 @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre de usuario"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input id="email" type="email" class="input--style-3 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Correo electrónico">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input id="password" type="password"
                                class="input--style-3 @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input id="password-confirm" type="password" class="input--style-3" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Confirmar contraseña">
                        </div>
                        <div class="p-t-10">
                            <button type="submit" class="btn rounded-pill fs-5"
                                style="background-color: #9B6C3F; height: 50px; color: white;">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

