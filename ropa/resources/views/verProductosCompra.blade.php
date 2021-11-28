@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/mi_carri.css') }}">
@endsection

@section('content')
    <section>
        <div>
            <br>
            <br>
            <h2 style="color:black">Tus productos comprados el : <p style="color:white">{{ $fecha }}</p></h2>
        </div>
        <br>
        @foreach ( $detallesVentas as $detalleVenta )
            <div class='carrito-productoss-container'>
                <img src="/{{ $detalleVenta->imagenProd}}">
                <ul>
                    <p><strong>Producto: </strong>{{ $detalleVenta->nombreProd}}</p>
                    <p><strong>Detalles: </strong>{{ $detalleVenta->detalleProd }}</p>
                    <p><strong>Precio: </strong>${{ $detalleVenta->precioProd }}</p>
                    <p><strong>Cantidad: </strong>{{ $detalleVenta->cantidad }}</p>
                </ul>
            </div>
        @endforeach
    </section>
@endsection   