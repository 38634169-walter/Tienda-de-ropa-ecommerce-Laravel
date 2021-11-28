@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/perfi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/section/mi_carri.css') }}">
    <!--SWEET-ALERT-2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    @php
        error_reporting(0);
        
    @endphp


    @if(session('ventaRealizadaDebito'))
        <script>
            Swal.fire({
              title: '<strong>Metodo de pago <u>Debito</u></strong>',
              icon: 'info',
              html:
                'Numero de cuenta a pagar <b>123456789</b>, ' +
                '<br>' +
                'Gracias por elegirnos ',
              showCloseButton: true,
              focusConfirm: true,
              confirmButtonText:
                '<i class="fa fa-thumbs-up"></i> De acuerdo!',
              confirmButtonAriaLabel: 'Thumbs up, great!',
            })
        </script>
    @endif
    @if(session('ventaRealizada'))
        <script>
            Swal.fire(
              'Comprado!',
              'Tu compra se realizo con exito!',
              'success'
            )
        </script>
    @endif
    @if($errorCompra)
        <script>
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Fallo la compra!'
            })
        </script>
    @endif
    <section>
        <div id="perfil-nombre-container">
            <h2>Perfil: <strong>{{session('nombreUsu')}}</strong></h2>
            <a href="{{ route('cerrarSession') }}">(cerrar sesion)</a>
            <select id="select-desicion">
                <option class="select-ventas" value="9" selected>Todos</option>
                <option class="select-ventas" value="2">Por pagar</option>
                <option class="select-ventas" value="3">Pagado</option>
                <option class="select-ventas" value="4">En camino</option>
                <option class="select-ventas" value="5">Entregado</option>
            </select>
        </div>
        <div>
            <h2> Estado de mis compras: </h2>
        </div>
        <div id="ventas">
            @foreach($ventas as $venta)
                @php
                    switch($venta->estadoEntrega){
                        case 2: $estado ='Por pagar' ;break;
                        case 3: $estado ='Pagado' ;break;
                        case 4: $estado ='En camino' ;break;
                        case 5: $estado ='Entregado' ;break;
                    }
                @endphp
                <div class='carrito-productoss-container'>
                    <img src="/imagenes/Relleno/compras.webp" alt="">
                    <ul>
                        <p><strong>Fecha de compra: </strong>{{$venta->fechaPedido}}</p>
                        <p><strong>Estado: </strong>{{$estado}}</p>
                        <p><strong>Tipo de pago: </strong>{{$venta->nombreTipoPago}}</p>
                        <p><strong>Direccion de entrega: </strong>{{$venta->direccionEntrega}}</p>
                        <p><strong>Telefono de referencia: </strong>{{$venta->telefonoEntrega}}</p>
                        <a id="quitar" style="background:green;" href="{{ route('verProductosCompra',$venta->idVenta) }}">Ver productos de mi compra</a>
                    </ul>
                </div>
            @endforeach
        </div>
        @if(empty($ventas[0]))
            <p style="text-align:center">No has realizado una compra hasta el momento</p>
        @endif
    </section>
    <script>
        $(document).ready(function(){
            $('#select-desicion').change(function(event){
                var opcion=$(this).val();
                $.ajax({
                    url:'/perfil/perfil-select',
                    method:'GET',
                    data:{opcion:opcion}
                }).done(function(respuesta){
                    var mostrar='';
                    
                    for(var i=0;i<respuesta.length;i++){
                        switch(respuesta[i].estadoEntrega){
                            case 2: $estado ='Esperando confirmacion' ;break;
                            case 3: $estado ='Pagado' ;break;
                            case 4: $estado ='En camino' ;break;
                            case 5: $estado ='Entregado' ;break;
                        }
                        mostrar+='<div class="carrito-productoss-container">';
                        mostrar+='<img src="/imagenes/Relleno/compras.webp" alt="">';
                        mostrar+='<ul>';
                        mostrar+='<p><strong>Comprado el: </strong>' + respuesta[i].fechaPedido + '</p>';
                        mostrar+='<p><strong>Estado: </strong>' + $estado + '</p>';
                        mostrar+='<p><strong>Tipo de pago: </strong>' + respuesta[i].nombreTipoPago + '</p>';
                        mostrar+='<p><strong>Direccion de entrega: </strong>' + respuesta[i].direccionEntrega + '</p>';
                        mostrar+='<p><strong>Telefono de referencia: </strong>' + respuesta[i].telefonoEntrega + '</p>';
                        var idV=respuesta[i].idVenta;
                        mostrar+=`<a id="quitar" style="background:green;" onclick="$(location).attr('href','/perfil/${idV}');">Ver productos de mi compra</a>`;
                        mostrar+='</ul>';
                        mostrar+='</div>';
                    }
                    
                    $('#ventas').empty();
                    $('#ventas').append(mostrar);                
                    if(respuesta ==''){
                        var mostrar2='<br>';
                        mostrar2+='<p style="text-align:center;">No hay compras en esta opcion</p>';
                        $('#ventas').empty();
                        $('#ventas').append(mostrar2);        
                    }
                })
                .fail(function(respuesta){
                    alert('fallo');
                    var mostrar='<br>';
                    mostrar2+='<p style="text-align:center;">No hay compras en esta opcion</p>';
                    $('#ventas').empty();
                    $('#ventas').append(mostrar); 
                });
            })
        })
    </script>
@endsection