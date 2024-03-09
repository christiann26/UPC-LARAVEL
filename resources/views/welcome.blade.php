@extends('layouts.app')

@section('CDNs')
    <!-- Se incluyen los estilos del carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@4.5.0/dist/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
@endsection

@section('estilos')
    <!-- Enlaces a tus estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css\custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css\cartas.css') }}">
    <link rel="stylesheet" href="{{ asset('css\team.css') }}">
@endsection

@section('content')
    <!-- Carousel principal -->
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-bs-ride="carousel"
        style="height: 1035px; position: relative; z-index: 1;">
        <!-- Contenido del carousel -->
        <div class="carousel-inner h-100">
            <!-- Elemento del carousel activo -->
            <div class="carousel-item active h-100">
                <!-- Video del carousel -->
                <video style="max-width: 100%;" playsinline autoplay muted loop loading="lazy">
                    <source src="{{ asset('videos/carousel.webm') }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>

    <!-- Sección principal -->
    <div class="section" style="background-image: url({{ asset('images/fondo.webp') }}); background-size: cover">
        <div class="container">
            <div class="row">
                <!-- Columna de video -->
                <div class="col-7" style="position: relative; z-index: 2;">
                    <!-- Video principal -->
                    <video playsinline autoplay muted loop id="player" style="position: relative; top: -40px;">
                        <!-- Archivo de video -->
                        <source src="{{ asset('videos/gameplay.webm') }}" type="video/mp4" />
                    </video>
                </div>
                <!-- Columna de texto -->
                <div class="col-4 " style="position: relative; top: 50px; left: 50px;">
                    <!-- Título -->
                    <h2 class="mb-5"
                        style="color: #8913ad; text-transform: uppercase; font-weight: 1000; font-size: 35px;font-family:Oswald,Arial,Georgia,sans-serif;">
                        Descifra el tablero y conviértete en un estratega sobresaliente</h2>
                    <!-- Descripción -->
                    <p style="color: #ffffff;">
                        Sumérgete en un mundo de magia y estrategia donde cada carta es una pieza en el tablero de la
                        historia. Desde las
                        sombras del pasado hasta los reinos más lejanos del futuro, tú decides el destino. ¿Construirás un
                        imperio indestructible? Elige tus cartas con
                        sabiduría, forja
                        alianzas y enfréntate a tus enemigos en un duelo de astucia y valor. Conviértete en el héroe que el
                        reino
                        necesita y escribe tu leyenda en las estrellas.</p>
                </div>
            </div>

            <!-- Sección de características -->
            <div class="row text-center text-white" style="padding: 10% 5%;">
                <!-- Característica: Cuerpo a cuerpo -->
                <div class="col">
                    <img src="{{ asset('images/espada_rol_.webp') }}" alt="" width="100px" height="100px">
                    <h2>Cuerpo a cuerpo</h2>
                    <p>
                        Se especializan en el combate cercano. Son hábiles
                        en el uso de armas como espadas, hachas o mazas, y prefieren enfrentarse directamente a sus enemigos
                        en
                        el campo de batalla. Suelen tener una alta resistencia y fuerza física, lo que les permite soportar
                        y causar grandes cantidades de daño en el fragor de la batalla.
                    </p>
                </div>
                <!-- Característica: Apoyo -->
                <div class="col">
                    <img src="{{ asset('images/estrella_rol_.webp') }}" alt="" width="100px" height="100px">
                    <h2>Apoyo</h2>
                    <p>
                        Destacan por su versatilidad y habilidades únicas.
                        Son individuos excepcionales que sobresalen en múltiples aspectos del juego, ya sea en combate,
                        estrategia o soporte. Su presencia en el campo de batalla suele ser crucial para el éxito del
                        equipo, ya que pueden desequilibrar la balanza a su favor con sus habilidades especiales y su
                        capacidad para adaptarse a diferentes situaciones.
                    </p>
                </div>
                <!-- Característica: Arquero -->
                <div class="col">
                    <img src="{{ asset('images/arquero_rol_.webp') }}" alt="" width="100px" height="100px">
                    <h2>Arquero</h2>
                    <p>
                        Expertos en el combate a distancia. Utilizan arcos y flechas para atacar a sus
                        enemigos desde lejos, aprovechando la precisión y la velocidad de sus disparos para infligir daño a
                        distancia. A menudo son ágiles y rápidos, capaces de moverse con facilidad por el campo de batalla
                        mientras mantienen a raya a sus adversarios con una lluvia de flechas certeras.
                    </p>
                </div>
                <!-- Característica: Catapulta -->
                <div class="col">
                    <img src="{{ asset('images/catapulta_rol_.webp') }}" alt="" width="125px">
                    <h2>Catapulta</h2>
                    <p>
                        Diseñadas para causar daño masivo en un área específica del campo de batalla. Son especialmente
                        efectivas contra objetivos estáticos o grupos de unidades enemigas, y pueden cambiar el curso de una
                        batalla con un solo lanzamiento bien dirigido.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de cartas -->
    <section class="sectionCartas">
        <div class="content">
            <div class="info">
                <p>¡Únete a nosotros para una emocionante aventura llena de estrategia, intriga y diversión! Ya seas un
                    maestro en tácticas o estés empezando en el mundo de los juegos de cartas estratégicos, tenemos una
                    experiencia diseñada para todos los niveles de habilidad. Prepárate para sumergirte en batallas épicas,
                    donde cada movimiento cuenta y la astucia es clave para la victoria.</p>
                <button class="btn">Crear mazo</button>
            </div>
            <!-- Swiper para mostrar las cartas -->
            <div class="swiper">
                <div id="wrapper1" class="swiper-wrapper">
                    <!-- Iteración sobre los datos de las cartas -->
                    @foreach ($cartas as $photo)
                        <div class="swiper-slide"
                            style="background: linear-gradient(to top, #27270f99, #203a4300, #2c536400), url({{ asset("images/$photo") }}) no-repeat 50% 50% / contain #d4ab30;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Círculos para la navegación del Swiper -->
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </section>

    <!-- Sección de equipos -->
    <div class="wrapper">
        <section class="module-team">
            <div class="team">
                <h2 class="title">Conoce nuestro equipo</h2>
                <div class="team-cards">
                    <!-- Contenedor para el slider de equipo -->
                    <div class="swiper-container">
                        <!-- Slides del equipo -->
                        <div class="swiper-wrapper">
                            @if (isset($miembros))
                                @foreach ($miembros as $miembro)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <span class="bg"></span>
                                            <span class="more"></span>
                                            <figure class="photo"><img src="{{ asset('images/' . $miembro->photo) }}">
                                            </figure>
                                            <article class="text">
                                                <p class="name">{{ $miembro->name }}</p>
                                                <p class="role">{{ $miembro->role }}</p>
                                                <p class="desc">{{ $miembro->desc }}</p>
                                            </article>

                                            <div class="social">
                                                <span class="pointer"></span>
                                                <div class="icons">
                                                    <a class="icon" href="{{ $miembro->website }}" target="_blank"
                                                        data-index="0"><img
                                                            src="https://rafaelalucas.com/dailyui/6/assets/link.svg"></a>
                                                    <a class="icon" href="{{ $miembro->email }}" target="_blank"
                                                        data-index="1"><img
                                                            src="https://rafaelalucas.com/dailyui/6/assets/email.svg"></a>
                                                    <a class="icon" href="{{ $miembro->linkedin }}" target="_blank"
                                                        data-index="2"><img
                                                            src="https://rafaelalucas.com/dailyui/6/assets/linkedin.svg"></a>
                                                    <a class="icon" href="{{ $miembro->dribbble }}" target="_blank"
                                                        data-index="3"><img
                                                            src="https://rafaelalucas.com/dailyui/6/assets/dribbble.svg"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <!-- Paginación y botones de navegación del slider -->
                    <div class="swiper-pagination"></div>
                    <div class="navigation">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<!-- Incluimos el footer -->
@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    <!-- Incluimos los scripts personalizados -->
    <script type="module" src="{{ asset('js\cartas.js') }}"></script>
    <script type="module" src="{{ asset('js\team.js') }}"></script>
@endsection
