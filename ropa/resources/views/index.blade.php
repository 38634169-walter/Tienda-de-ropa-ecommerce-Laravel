@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/index-responsiv.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider2-1view.css') }}">
@endsection

@section('content')
@php
    error_reporting(0);
@endphp

    <section>
        <div class="slider-container">                              <!--SLIDER PORTADA-->
            <div class="slider s1">
                <ul>
                    <li><h1>Encontra lo que buscas</h1></li>
                    <li>
                        <p>
                            En Veronica's nos dedicamos a entregarte lo buscas
                            a un precio justo con muchos medios de pagos
                        </p>
                    </li>
                    <li id="sin-fondo-portada"><img src="/imagenes/SinFondo/3.webp" alt=""></li>
                </ul>
            </div>
            <div class="slider s2">
                <ul>
                    <li><h1>Ofertas todos los Miercoles</h1></li>
                    <li>
                        <p>
                            Nos gusta recibirte y asesorarte por eso
                            preparamos durante toda la semana un catalogo con 
                            ofertas exclusivas para vos todos los miercoles
                        </p>
                    </li>
                    <li id="sin-fondo-portada2"><img src="/imagenes/SinFondo/1.webp" alt=""></li>
                </ul>
            </div>
            <div class="slider s3">
                <ul>
                    <li><h1>Nos gusta saber que no vendemos solo ropa</h1></li>
                    <li>
                        <p>
                            Nos gusta expresarnos
                            tanto verbal como fisicamente por eso te traemos 
                            variedades de modelos y diseños para 
                            que puedas expresarte de la manera que los sientas
                        </p>
                    </li>
                </ul>
            </div>
            <div class="slider s4">
                <ul>
                    <li><h1>Cerca tuyo</h1></li>
                    <li>
                        <p>
                            Podes pedir tu entrega a domicilio con reembolso
                            por daños y el translado sera totalmente bonificado 
                            por nosotros 
                        </p>
                    </li>
                    <li id="sin-fondo-portada4"><img src="/imagenes/Relleno/relleno2.webp" alt=""></li>
                </ul>
            </div>
        </div>
        <ul class="flechas-slider">                                 <!--SLIDER PORTADA flechas-->
            <li><i class="fas fa-chevron-right flecha-derecha"></i><i class="fas fa-chevron-left flecha-izquierda"></i></li>
        </ul>
        <div class="paginacion">                            <!--SLIDER PORTADA paginacion-->
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </div>
        <div class="section1-container">                                <!--SECION 1 RIGHT Y LEFT-->
            <div class="section1-left">
                <ul>
                    <img src="/imagenes/SinFondo/4.webp" alt="">
                </ul>
            </div>
            <div class="section1-right">
                <h1>No olvides visitarnos los Miercoles de ofertas</h1>
                <p>
                    En Victoria's durante toda la semana preparamos Ofertas
                    especiales que liberamos los Miercoles para vos, no
                    olvides pasar antes de que se agoten 
                </p>
                <img src="/imagenes/Relleno/relleno3.webp" alt="">
            </div>
        </div>
        <div class="ventas-super-container">
            <div class="ventas-img-container">                                  <!-- VENTAS IMG -->
                <img src="/imagenes/SinFondo/2.webp" alt="">
            </div>
            <h1 class="titulo-venta">Nos esforzamos por encontrar lo que te gusta</h1>
        </div>
        <div class="ropa-container">                            <!--ROPA CONTAINER-->

            @foreach ( $productos as $producto )
                <li>
                    <a href="{{ route('descripcionProducto',$producto->idProd) }}">
                        <img src="/{{ $producto->imagenProd }}">
                        <h1>{{ $producto->nombreProd }}</h1>
                        <p>Solo por $ {{ $producto->precioProd }}</p>
                    </a>
                </li>    
            @endforeach

        </div>
        <div class="diseños-especiales-container">                <!--DISEÑOS ESPECIALES-->
            <h1>Diseños especiales</h1>
            <div class="slider-ropa-especial">
                <ul>
                @foreach ($productosEspeciales as $productoEspecial)
                    <li class="vestidos-especiales">
                        <a href="{{ route('descripcionProducto',$productoEspecial->idProd) }}">
                            <img src="/{{ $productoEspecial->imagenProd }}" alt="">
                            <h1>{{ $productoEspecial->nombreProd }}</h1>
                            <p>Solo por ${{ $productoEspecial->precioProd }}</p>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            <ul class="flechas-diseños-especiales">
                <li><i class="fas fa-chevron-left flecha-izquierda-especiales"></i><i class="fas fa-chevron-right flecha-derecha-especiales"></i></li>
            </ul>
        </div>
        <div class="diseños-especiales-container2">                <!--DISEÑOS ESPECIALES 2-->
            <h1>Diseños especiales</h1>
            <div class="slider-ropa-especial2">
                <ul>
                @foreach ($productosEspeciales as $productoEspecial)
                    <li class="vestidos-especiales2">
                        <a href="{{ route('descripcionProducto',$productoEspecial->idProd) }}">
                            <img src="/{{ $productoEspecial->imagenProd }}" alt="">
                            <h1>{{ $productoEspecial->nombreProd }}</h1>
                            <p>Solo por ${{ $productoEspecial->precioProd }}</p>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            <ul class="flechas-diseños-especiales2">
                <li><i class="fas fa-chevron-left flecha-izquierda-especiales2"></i><i class="fas fa-chevron-right flecha-derecha-especiales2"></i></li>
            </ul>
        </div>
    </section>
    @section('scripts')
        <script src="{{ asset('js/slider-portada.js') }}"></script>
        <script src="{{ asset('js/slider-ropa-especial.js') }}"></script>
        <script src="{{ asset('js/slider-ropa-especial2.js') }}"></script>
    @endsection
@endsection