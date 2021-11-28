<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\categoriasProductos;
use App\Models\SubCategoriasProductos;

class SubCategoriasProductosController extends Controller
{
    //
    public function sub_categoria_producto($nombre){    
        $categoriaID=SubCategoriasProductos::select('categoriaProducto_ID')->where('nombreSubCategoria',$nombre)->get();

        $productos=Productos::join('sub_categorias_productos','sub_categorias_productos.id','=','productos.subCategoria_id')
            ->where('sub_categorias_productos.nombreSubCategoria',$nombre)
            ->get(['productos.id as idProd','productos.imagenProd','productos.nombreProd','productos.precioProd']);

        $productosMostrar=new Productos;
        $productosMostrar=Productos::where('estadoProd',1)
            ->orderBy('nombreProd','asc')
            ->get();
    

        return view('subCategorias',compact('productos','productosMostrar'));
    }
}
