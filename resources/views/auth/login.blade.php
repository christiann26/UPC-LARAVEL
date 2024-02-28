@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\custom.css') }}">
@endsection

@section('content')
    <div style="height: 75px"></div>
    <div class="container-fluid fondoLogin">
        <div class="row justify-content-center">
            <div class="col-2" style="margin-top: 130px;">
                <h2 class="mt-5 text-center fw-bold fs-1 text-white">{{ __('INICIAR SESIÓN') }}</h2>
                <form method="POST" action="{{ route('login') }}" class="mt-2">
                    @csrf
                    <fieldset>
                        <!--Correo electrónico-->
                        <div class="form-group" style="height: 120px;">
                            <label for="email" class="mt-3 text-white fs-4">{{ __('Correo electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                style="border-radius: 25px; height: 45px; background-color:lightgray;" />
                            @error('email')
                                <span class="text-center invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!--Contrasenya-->
                        <div class="form-group" style="height: 150px;">
                            <label for="password" class="text-white fs-4">{{ __('Contraseña') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password"
                                style="border-radius: 25px; height: 45px; background-color:lightgray;">

                            @error('password')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div> --}}

                        <div class="text-center">
                            <button type="submit" class="btn border rounded-pill fs-5"
                                style="background-color: #5B5A95; height: 50px; color: #ff9db7;">
                                {{ __('Iniciar sesión') }}
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
