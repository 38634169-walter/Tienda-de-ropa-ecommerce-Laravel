@extends('layout')

@section('cdns')
    <link href="{{ asset('css/section/descripcion-produ.css') }}" rel="stylesheet">
    <!--SWEET-ALERT-2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    @php
        error_reporting(0);
    @endphp
    @if($agregado==true)
        <script>
            Swal.fire(
              'Agregado!',
              'Agregado al carrito!',
              'success'
            )
        </script>
    @endif
    @if($noAgregado==true)
        <script>
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No se pudo agregar!'
            })
        </script>
    @endif
    @if($enCarrito==true)
        <script>
            Swal.fire({
              icon: 'warning',
              title: 'En carrito',
              text: 'Este producto ya se encuentra en el carrito!'
            })
        </script>
    @endif
    @if($noLoggeado)
        <script>
            Swal.fire({
                title: 'No estas registardo!',
                text: "Registrarte es facil y rapido!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Ya tengo cuenta!',
                cancelButtonColor: '#808000',
                confirmButtonColor: '#228b22',
                confirmButtonText: 'Registrarme, rapido!',
                reverseButtons:true,
            }).then((result) => {
                if (result.isConfirmed) {
                window.location = "/login/registrarme";
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location = "/login";
                }
            });
        </script>
    @endif
    <section>
        <br>
        <br>
        <div class='producto-desc-container'>
            <ul>
                <img src="/{{$producto->imagenProd}}" id="mostrar-imagen">
                <li>
                    <img src="/{{$producto->imagenProd}}" class="imagenes-min">
                    <img src="/{{$producto->imagen2}}" class="imagenes-min">
                    <img src="/{{$producto->imagen3}}" class="imagenes-min">
                </li>
            </ul>
            <div>
                <h2> {{ $producto->nombreProd }} </h2>
                <p id="precioProd"> ${{ $producto->precioProd }}  </p>
                <form action='{{ route('agregarAlCarrito',$producto->id) }}' method='POST'>
                    @csrf
                    <div>
                        <button id="decrementar" type="button" class="btn-aumentar-bajar">-</button>
                        <input  id="cantidad-articulo" style='width:1cm;' type='number' min='1' value='1' name='cantidad'>
                        <button id="aumentar" type="button" class="btn-aumentar-bajar">+</button>
                    </div>
                    @error('cantidad')
                        <small style="color:red;">*Se debe ingresar una cantidad</small>
                    @enderror
                    <br>
                    <button type="submit" name='btn-agregar'><i class='fas fa-plus'></i>Agregar a carrito</button>
                </form>
                <br>
                <p> {{ $producto->detalleProd }} </p>
            </div>
        </div>
        <br>
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
    @section('scripts')
        <script src="{{ asset('js/botones-cantidad.js') }}"></script>  
        <script src="{{ asset('js/slider-mostrar-mas.js') }}"></script>
        <script src="{{ asset('js/slider-mostrar-mas2.js') }}"></script>      
        <script src="{{ asset('js/imagen-muestra.js') }}"></script>      
    @endsection
@endsection