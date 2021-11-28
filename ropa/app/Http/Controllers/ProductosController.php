<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Ventas;
use App\Models\DetallesVentas;

class ProductosController extends Controller
{
    //
    public function index(){
        $productos=new Productos;
        $productos=Productos::join('sub_categorias_productos','sub_categorias_productos.id','=','productos.subCategoria_id')
        ->where('sub_categorias_productos.nombreSubCategoria','Especiales')
        ->orderBy('productos.nombreProd','asc')
        ->get(['productos.id as idProd','productos.imagenProd','productos.nombreProd','productos.precioProd']);
        

        $productosEspeciales=new Productos;
        $productosEspeciales=Productos::join('sub_categorias_productos','sub_categorias_productos.id','=','productos.subCategoria_id')
        ->where('sub_categorias_productos.nombreSubCategoria','Especiales')
        ->orderBy('productos.nombreProd','asc')
        ->get(['productos.id as idProd','productos.imagenProd','productos.nombreProd','productos.precioProd']);
        return view('index',compact('productos','productosEspeciales'));

    }

    public function buscador(Request $request){
        $request->validate([
            'palabra'=>'required'
        ]);
        $palabra=$request->palabra;
        $productos=new Productos;
        $productos=Productos::where('nombreProd','like',"%$palabra%")->get();
        return view('buscador',compact('productos','palabra'));

    }

    public function carrito($quitado=false,$validado=false){
        $sesionIniciada=false;
        if(session('logged')){
            $sesionIniciada=true;
            $ventas=new Ventas;
            $ventas=Ventas::where('usuario_id',session('idUsu'))
            ->where('estadoEntrega',1)
            ->get();
            if(empty($ventas[0])){
                return view('carrito',compact('sesionIniciada'));
            }
            
            $detallesVentas=new DetallesVentas;
            $detallesVentas=DetallesVentas::join('productos','productos.id','=','detalles_ventas.producto_id')
                ->where('detalles_ventas.venta_id',$ventas[0]->id)
                ->get(['detalles_ventas.id as idDetallesVentas','detalles_ventas.cantidad','productos.imagenProd','productos.nombreProd','productos.detalleProd','productos.precioProd','detalles_ventas.venta_id']);
            $montoTotal=0;
            $comprando=false;
            $tam=sizeof($detallesVentas);
            for($i=0;$i<$tam;$i++){
                $montoTotal+=$detallesVentas[$i]->cantidad * $detallesVentas[$i]->precioProd;
            }

            if($montoTotal>0){
                $comprando=true;
                if($quitado==true){
                    return view('carrito',compact('sesionIniciada','detallesVentas','montoTotal','comprando','quitado'));
                }
                if($validado==true){
                    return view('carrito',compact('sesionIniciada','detallesVentas','montoTotal','comprando','validado'));
                }
                return view('carrito',compact('sesionIniciada','detallesVentas','montoTotal','comprando'));
            }
            else{
                if($quitado==true){
                    return view('carrito',compact('sesionIniciada','quitado'));
                }
                return view('carrito',compact('sesionIniciada'));
            }
        }
        else{
            return view('carrito',compact('sesionIniciada'));
        }
    }

    public function descripcion_producto(Productos $producto){
        $productosMostrar=new Productos;
        $productosMostrar=Productos::where('estadoProd',1)
        ->orderBy('nombreProd','asc')
        ->get();
        return view('descripcionProducto',compact('producto','productosMostrar'));
    }

    public function agregar_al_carrito(Request $request, $id){
        $request->validate([
            'cantidad' => 'required'
        ]);
        $producto=new Productos;
        $producto=Productos::where('id',$id)->first();
        $productosMostrar=new Productos;
        $productosMostrar=Productos::where('estadoProd',1)
            ->orderBy('nombreProd','asc')
            ->get();
        if(session('logged')){
            $ventas=new Ventas;
            $ventas=Ventas::where('estadoEntrega',1)
                ->where('usuario_id',session('idUsu'))
                ->get();
            if(empty($ventas[0])){
                $ventas=new Ventas;                
                $ventas->usuario_id	= session('idUsu');
                $ventas->fechaPedido = now();
                $ventas->estadoEntrega =1;
                $ventas->save();

                $detallesVentas=new DetallesVentas;
                $detallesVentas->venta_id=$ventas->id;
                $detallesVentas->producto_id=$id;
                $detallesVentas->cantidad=$request->cantidad;
            }
            else{
                $detallesVentas=new DetallesVentas;
                $detallesVentas=DetallesVentas::where('producto_id',$id)
                    ->where('venta_id',$ventas[0]->id)
                    ->get();
                if(empty($detallesVentas[0])){
                    $detallesVentas=new DetallesVentas;
                    $detallesVentas->venta_id=$ventas[0]->id;
                    $detallesVentas->producto_id=$id;
                    $detallesVentas->cantidad=$request->cantidad;
                }
                else{                    
                    $enCarrito=true;
                    return view('descripcionProducto',compact('producto','enCarrito','productosMostrar'));
                }
            }
            
            if($detallesVentas->save()){
                $agregado=true;
                return view('descripcionProducto',compact('producto','agregado','productosMostrar'));
            }
            else{
                $noAgregado=false;
                return view('descripcionProducto',compact('producto','noAgregado','productosMostrar'));
            }
        }
        else{
            $noLoggeado=true;
            return view('descripcionProducto',compact('producto','noLoggeado','productosMostrar'));
        }
    }

    public function quitar_del_carrito($id){
        $detalleVenta=new DetallesVentas;
        $detalleVenta=DetallesVentas::where('id',$id)->first();
        $detalleVenta->delete();
        $quitado=true;
        return $this->carrito($quitado);
    }
    public function completar_compra(Ventas $venta,Request $request){
        $request->validate([
            'direccion' => 'required',
            'telefono' => 'required'
        ]);
        $venta->direccionEntrega = $request->direccion;
        $venta->telefonoEntrega = $request->telefono;
        $venta->save();
        $validado=true;
        return $this->carrito(false,$validado);
    }

}
