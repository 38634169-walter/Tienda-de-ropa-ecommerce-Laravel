@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/mi_carri.css') }}">
    <!--SWEET-ALERT-2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
@php
    error_reporting(0);
@endphp
@error('telefono')
    <script>
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Probablemente olvidaste llenar algunos campos!'
        })
    </script>
@enderror
@error('direccion')
    <script>
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Probablemente olvidaste llenar algunos campos!'
        })
    </script>
@enderror
@if($validado==true)
    @php
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));    

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia

        foreach($detallesVentas as $producto){
            $item = new MercadoPago\Item();
            $item->title = $producto->nombreProd;
            $item->quantity = $producto->cantidad;
            $item->unit_price = $producto->precioProd;

            $productos[]=$item;
        }

        $preference->back_urls = array(
            "success" => route('comprado',$detallesVentas[0]->venta_id),
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";

        $preference->items = $productos;
        $preference->save();
    @endphp
@endif
        
    <section class="body-diferente">
        @if($quitado==true)
            <script>
                Swal.fire(
                  'Quitado!',
                  'Quitado del carrito!',
                  'success'
                )
            </script>
        @endif
        @if($sesionIniciada == true)
            @if($comprando == true)
                <div>
                    <br>
                    <br>
                    <h2>Tus productos agregados al carrito: </h2>
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
                            <form action="{{ route('quitarDelCarrito',$detalleVenta->idDetallesVentas) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" id='quitar'>Quitar del carrito</button>
                            </form>
                        </ul>
                    </div>
                @endforeach

                <div class='comprar-container'>
                    <h2>Información de venta</h2>
                    <form action='{{ route('completarCompra',$detallesVentas[0]->venta_id)}}' method='POST'>
                        @csrf
                        <li><label for=''>Direccion de envio:</label><input type='text' placeholder="Direccion" name='direccion' value="{{ old('direccion') }}"></li>
                        @error('direccion')
                            <small style="color:red;">*{{ $message }}</small>
                        @enderror
                        <li><label for=''>Telefono de referencia:</label><input class='inputN' type='number' placeholder="Telefono" name='telefono' value="{{ old('telefono') }}"></li>
                        @error('telefono')
                            <small style="color:red;">*{{ $message }}</small>
                        @enderror
                        <div id="btn-pago-container">
                            <i class='fas fa-shopping-cart'></i>
                            <h2 style='font-size:20px;'>Total: ${{ $montoTotal }}</h2>
                            <button id="btn-pago">Comprar</button>
                        </div>
                    </form>
                </div>    
            @else
                <br>
                <br>
                <br>
                <div style='display:flex;justify-content:center;align-items:center;'>
                    <p style='text-align:center;'>No hay productos agregados hasta el momento</p>
                </div>
            @endif
        @else
            <div>
                <br>
                <br>
                <h2 style="color:white">No estas registrado todavia! </h2>
                <h2>Te damos la bienvenida, registrarse toma unos pocos segundos</h2>
                <br>
                <br>
                <br>
                <h3 style="text-align:center; font-size:25px;">Podes hacerlo clickeando <a href="{{ route('registrarme') }}">aca</a></h3>
            </div>
        @endif
    </section>
    @if($validado==true)
        <script>
            Swal.fire({
                imageUrl: '/imagenes/Relleno/carrito.jpg',
                imageWidth: 200,
                imageHeight: 100,
                showCloseButton: true,
              title:"<strong>Ultimo paso para completar tu compra</strong>",
              html:
                'Gracias por elegirnos!'+
                '<br>'+
                '<div class="cho-container"></div>',
                showCancelButton: false,
                showConfirmButton: false,
            })
        </script>
    @endif

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    
    <script>
        // Agrega credenciales de SDK
          const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-AR'
          });

          // Inicializa el checkout
          mp.checkout({
              preference: {
                  id: '{{ $preference->id }}'
              },
              render: {
                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
              }
        });
    </script>

@endsection