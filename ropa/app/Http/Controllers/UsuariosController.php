<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Ventas;
use App\Models\DetallesVentas;
use App\Models\Productos;
use App\Models\TipoPagos;

use Illuminate\Support\Facades\Http;

class UsuariosController extends Controller
{
    //
    public function cerrar_session(){
        session()->flush();
        return redirect()->route('login');
    }

    public function perfil(){
        $ventas=Ventas::join('tipos_pagos','tipos_pagos.id','=','ventas.tipoPago_id')
        ->where('ventas.usuario_id',session('idUsu'))
        ->orderBy('ventas.fechaPedido','desc')
        ->get(['ventas.estadoEntrega','ventas.fechaPedido','tipos_pagos.nombreTipoPago','ventas.direccionEntrega','ventas.telefonoEntrega','ventas.id as idVenta']);
        return view('/perfil',compact('ventas'));
    }

    public function registrarme_store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'DNI' => 'required',
            'email' => 'required',
            'usuario' => 'required',
            'clave1' => 'required',
            'clave2' => 'required'
        ]);

        $usuario=new Usuarios;
        $usuario=Usuarios::where('usuario',$request->usuario)->get();
        error_reporting(0);
        if($usuario[0]){
            $usuarioEnUso=true;
            return view('/registrarme',compact('usuarioEnUso'));
        }
        if($request->clave1 != $request->clave2){
            $diferentesClaves=true;
            return view('/registrarme',compact('diferentesClaves'));
        }
        $usuario=new Usuarios;
        $usuario->nombreUsu = $request->nombre;
        $usuario->apellidoUsu = $request->apellido;
        $usuario->DNI = $request->DNI;
        $usuario->emailUsu = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave1;
        $usuario->estadoUsu = 1;
        if($request->telefono){
            $usuario->telefonoUsu = $request->telefono;
        }
        if($usuario->save()){
            $registrado=true;
            return view('/login',compact('registrado'));
        }
        else{
            $errorRegistrar=true;
            return view('/login',compact('errorRegistrar'));
        }
    }

    public function ingresar(Request $request){
        $request->validate([
            'usuario' => 'required',
            'clave' => 'required'
        ]);
        $usuario=new Usuarios;
        $usuario=Usuarios::where('usuario',$request->usuario)
            ->where('clave',$request->clave)
            ->get();
        
        if(empty($usuario[0])){
            $errorDatos=true;
            return view('login',compact('errorDatos'));
        }
        else{
            session(['logged' => true]);
            session(['nombreUsu' => $usuario[0]->nombreUsu]);
            session(['idUsu' => $usuario[0]->id]);
            return redirect()->route('index');
        }
    }

    public function perfil_select(Request $request){
        switch($request->opcion){
            case '1':
                $ventas=Ventas::join('usuarios','usuarios.id','=','ventas.usuario_id')
                    ->where('usuarios.id',session('idUsu'))
                    ->where('ventas.estadoEntrega',1)
                    ->get(['ventas.id as idVentas']);
                
                $productos=DetallesVentas::join('productos','productos.id','=','detalles_ventas.producto_id')
                    ->where('detalles_ventas.venta_id',$ventas[0]->idVentas)
                    ->get(['productos.imagenProd','productos.nombreProd','productos.detalleProd','productos.precioProd','detalles_ventas.cantidad','detalles_ventas.id as idDetallesVentas']);
                return response()->json($productos);
                break;
            case '2':
                $ventas=Ventas::join('tipos_pagos','tipos_pagos.id','=','ventas.tipoPago_id')
                    ->where('ventas.estadoEntrega',2)
                    ->where('ventas.usuario_id',session('idUsu'))    
                    ->orderBy('ventas.fechaPedido','desc')
                    ->get(['ventas.estadoEntrega','ventas.fechaPedido','tipos_pagos.nombreTipoPago','ventas.direccionEntrega','ventas.telefonoEntrega','ventas.id as idVenta']);
                return response()->json($ventas);
                break;
            case '3':
                $ventas=Ventas::join('tipos_pagos','tipos_pagos.id','=','ventas.tipoPago_id')
                    ->where('ventas.estadoEntrega',3)
                    ->where('ventas.usuario_id',session('idUsu'))    
                    ->orderBy('ventas.fechaPedido','desc')
                    ->get(['ventas.estadoEntrega','ventas.fechaPedido','tipos_pagos.nombreTipoPago','ventas.direccionEntrega','ventas.telefonoEntrega','ventas.id as idVenta']);
                return response()->json($ventas);
                break;
            case '4':
                $ventas=Ventas::join('tipos_pagos','tipos_pagos.id','=','ventas.tipoPago_id')
                    ->where('ventas.estadoEntrega',4)
                    ->where('ventas.usuario_id',session('idUsu'))    
                    ->orderBy('ventas.fechaPedido','desc')
                    ->get(['ventas.estadoEntrega','ventas.fechaPedido','tipos_pagos.nombreTipoPago','ventas.direccionEntrega','ventas.telefonoEntrega','ventas.id as idVenta']);
                return response()->json($ventas);
                break;
            case '9':
                $ventas=Ventas::join('tipos_pagos','tipos_pagos.id','=','ventas.tipoPago_id')
                    ->where('ventas.usuario_id',session('idUsu'))    
                    ->orderBy('ventas.fechaPedido','desc')
                    ->get(['ventas.estadoEntrega','ventas.fechaPedido','tipos_pagos.nombreTipoPago','ventas.direccionEntrega','ventas.telefonoEntrega','ventas.id as idVenta']);
                return response()->json($ventas);
                break;

        }

    }

    public function ver_productos_compra(Ventas $id){
        $detallesVentas=DetallesVentas::join('productos','productos.id','=','detalles_ventas.producto_id')
            ->where('detalles_ventas.venta_id',$id->id)
            ->get();
        $fecha=$id->fechaPedido;
        return view('verProductosCompra',compact('detallesVentas','fecha'));
    }
/*
    public function completar_compraaa(Request $request,Ventas $venta){
        $request->validate([
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        $vali='ok';
        return view('carrito',compact('vali'));
        return redirect()->route('carrito')->with('validado','ok');
        return response()->json($validado);




        $guardar=false;
        
        if($request->tipoPago == 1){
            $venta->direccionEntrega = $request->direccion;
            $venta->telefonoEntrega = $request->telefono;
            $venta->tipoPago_id = $request->tipoPago;
            $venta->estadoEntrega = 2;
            $guardar=true;
        }
        if($request->tipoPago == 2){
            //BOTON DE PAGO//
            $venta->direccionEntrega = $request->direccion;
            $venta->telefonoEntrega = $request->telefono;
            $venta->tipoPago_id = $request->tipoPago;
            $venta->estadoEntrega = 3;
            $guardar=true;
        }
        if($guardar==true){
            if($venta->save()){
                if($request->tipoPago == 1){
                    return redirect()->route('perfil')->with('ventaRealizadaDebito','ok');
                }
                if($request->tipoPago == 2){
                    return redirect()->route('perfil')->with('ventaRealizadaCredito','ok');
                }
            }
            else{
                return redirect()->route('perfil')->with('errorCompra','ok');
            }
        }
    }
    */
    
    public function comprado(Ventas $venta, Request $request){
        $pago=$request->get('payment_id');
        $respuesta=Http::get("https://api.mercadopago.com/v1/payments/$pago"."?access_token=APP_USR-4587650337182780-080519-b5a39d8d33d5b18b981d4cbdfcf8cfc9-802739488" );
        
        $respuesta = json_decode($respuesta);
        $status = $respuesta->status;
        $tipoPago = $respuesta->payment_type_id;

        if($status == 'approved'){
            if($tipoPago=='credit_card'){
                $venta->estadoEntrega=3;
                $venta->tipoPago_id=2;
            }
            if($tipoPago=='debit_card'){
                $venta->estadoEntrega=3;
                $venta->tipoPago_id=1;
            }
            if($tipoPago=='ticket'){
                $venta->estadoEntrega=2;
                $venta->tipoPago_id=3;
            }

            if($venta->save()){
                return redirect()->route('perfil')->with('ventaRealizada','ok');
            }
        }
    }

}
