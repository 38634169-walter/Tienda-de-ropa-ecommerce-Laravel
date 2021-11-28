@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/index-responsiv.css') }}">
@endsection

@section('content')
    <section>
        <br>
        <h2>Resultados para {{ $palabra }} ...</h2>
        <div class='ropa-container'>
            @foreach($productos as $producto)
                <li><a href="{{ route('descripcionProducto',$producto->id) }}">
                    <img src="/{{ $producto->imagenProd }}">
                    <h1>{{ $producto->nombreProd }}</h1>
                    <p>Solo por ${{ $producto->precioProd }}</p>
                </a></li>    
            @endforeach
            @if(empty($productos[0]))
                <p>No hay resultados para esta busqueda</p>
            @endif
        </div>
    </section>
@endsection