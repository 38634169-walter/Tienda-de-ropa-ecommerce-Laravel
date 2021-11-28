@extends('layout')


@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/index-responsiv.css') }}">
    <link rel="stylesheet" href="{{ asset('css/section/descripcion-produ.css') }}">
@endsection

@section('content')
    <section>
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

        <div class="mostrar-mas-container">                <!--DISEÑOS ESPECIALES-->
            <h1>Más productos</h1>
            <div class="slider-mostrar-mas">
                <ul>
                @foreach ($productosMostrar as $productoMostrar)
                    <li class="mostrar-mas">
                        <a href="{{ route('descripcionProducto',$productoMostrar->id) }}">
                            <img src="/{{ $productoMostrar->imagenProd }}" alt="">
                            <h1>{{ $productoMostrar->nombreProd }}</h1>
                            <p>Solo por ${{ $productoMostrar->precioProd }}</p>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            <ul class="flechas-mostrar-mas">
                <li><i class="fas fa-chevron-left flecha-izquierda-mostrar-mas"></i><i class="fas fa-chevron-right flecha-derecha-mostrar-mas"></i></li>
            </ul>
        </div>
        <div class="mostrar-mas-container2">                <!--DISEÑOS ESPECIALES 2-->
            <h1>Más productos</h1>
            <div class="slider-mostrar-mas2">
                <ul>
                @foreach ($productosMostrar as $productoMostrar)
                    <li class="mostrar-mas2">
                        <a href="{{ route('descripcionProducto',$productoMostrar->id) }}">
                            <img src="/{{ $productoMostrar->imagenProd }}" alt="">
                            <h1>{{ $productoMostrar->nombreProd }}</h1>
                            <p>Solo por ${{ $productoMostrar->precioProd }}</p>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            <ul class="flechas-mostrar-mas2">
                <li><i class="fas fa-chevron-left flecha-izquierda-mostrar-mas2"></i><i class="fas fa-chevron-right flecha-derecha-mostrar-mas2"></i></li>
            </ul>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/slider-mostrar-mas.js') }}"></script>
    <script src="{{ asset('js/slider-mostrar-mas2.js') }}"></script> 
@endsection