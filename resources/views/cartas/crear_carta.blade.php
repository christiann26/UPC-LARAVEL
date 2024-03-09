@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\crear-carta.css') }}">
@endsection

@section('content')
    <div style="margin-top: 110px">
        <div class="container">
            <form action="{{ route('carta.crear') }}" method="post" enctype="multipart/form-data" class="row justify-content-center">
                @csrf
                <div class="col-4 text-center">
                    <!-- PHOTO DE LA CARTA -->
                    <div class="form-input text-center">
                        <div class="preview">
                            <img id="file-ip-1-preview" alt="Imagen previa">
                        </div>
                        <label for="file-ip-1">Subir imagen</label>
                        <input type="file" id="file-ip-1" name="photo" accept="image/png, image/jpg, image/webp"
                        value="{{ old('photo') }}"
                            onchange="showPreview(event);">
                        @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4 container1">
                    <h4 class="text-center">Crear Carta</h4>

                    <!-- NOMBRE DE LA CARTA -->
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre de la carta"
                            value="{{ old('nombre') }}" />
                    </div>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- TIPO DE ROL -->
                    <div class="input-group input-group-icon">
                        <label for="role">Rol</label>
                        <br>
                        <select name="role" id="role" style="width:511px;">
                            <option value="Cuerpo a cuerpo" @if (isset($carta) && $carta['role'] == 'Cuerpo a cuerpo') selected @endif>Cuerpo a
                                Cuerpo
                            </option>
                            <option value="Luchador" @if (isset($carta) && $carta['role'] == 'Luchador') selected @endif>Luchador</option>
                            <option value="Tirador" @if (isset($carta) && $carta['role'] == 'Tirador') selected @endif>Tirador</option>
                            <option value="Apoyo" @if (isset($carta) && $carta['role'] == 'Apoyo') selected @endif>Apoyo</option>
                        </select>
                    </div>
                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- ELIXIR DE LA CARTA -->
                    <div class="input-group">
                        <label for="coste_elixir">Coste de elixir</label>
                        <br>
                        <select name="coste_elixir" id="coste_elixir" style="width:511px;">
                            <option value="1" @if (isset($carta) && $carta['coste_elixir'] == '1') selected @endif>1</option>
                            <option value="2" @if (isset($carta) && $carta['coste_elixir'] == '2') selected @endif>2</option>
                            <option value="3" @if (isset($carta) && $carta['coste_elixir'] == '3') selected @endif>3</option>
                            <option value="4" @if (isset($carta) && $carta['coste_elixir'] == '4') selected @endif>4</option>
                            <option value="5" @if (isset($carta) && $carta['coste_elixir'] == '5') selected @endif>5</option>
                            <option value="6" @if (isset($carta) && $carta['coste_elixir'] == '6') selected @endif>6</option>
                            <option value="7" @if (isset($carta) && $carta['coste_elixir'] == '7') selected @endif>7</option>
                            <option value="8" @if (isset($carta) && $carta['coste_elixir'] == '8') selected @endif>8</option>
                            <option value="9" @if (isset($carta) && $carta['coste_elixir'] == '9') selected @endif>9</option>
                            <option value="10" @if (isset($carta) && $carta['coste_elixir'] == '10') selected @endif>10</option>
                        </select>
                    </div>
                    {{-- Error de validación  --}}
                    @error('coste_elixir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror



                    <div class="text-center mt-3">
                        <button type="submit" class="btn rounded-pill fs-5 text-white" style="background-color: #c26a11">
                            Crear carta
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
