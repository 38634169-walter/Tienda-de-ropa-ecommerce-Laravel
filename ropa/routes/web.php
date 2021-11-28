<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\SubCategoriasProductosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductosController::class,'index'])
    ->name('index');

Route::post('/buscador',[ProductosController::class,'buscador'])
    ->name('buscador');

Route::get('/{producto}/descripcion-producto',[ProductosController::class,'descripcion_producto'])
    ->name('descripcionProducto');

Route::get('/perfil',[UsuariosController::class,'perfil'])
    ->middleware('sesionIniciada')
    ->name('perfil');
    
Route::get('/carrito',[ProductosController::class,'carrito'])
    ->name('carrito');



//menu
Route::view('/trabaja','trabaja')->name('trabaja');
Route::view('/contacto','contacto')->name('contacto');
Route::view('/sucursales','sucursales')->name('sucursales');


Route::post('/carrito/{id}/agregar-al-carrito',[ProductosController::class,'agregar_al_carrito'])
    ->name('agregarAlCarrito');

Route::view('/login','login')
    ->middleware('loggeado')
    ->name('login');

Route::post('/login',[UsuariosController::class,'ingresar'])
    ->name('ingresar');

Route::get('/cerrar-sesion',[UsuariosController::class,'cerrar_session'])
    ->middleware('sesionIniciada')
    ->name('cerrarSession');

Route::view('/login/registrarme', 'registrarme')
    ->middleware('loggeado')
    ->name('registrarme');

Route::post('/login/registrarme',[UsuariosController::class,'registrarme_store'])
    ->middleware('loggeado')
    ->name('registrarme.store');

Route::delete('/carrito/{id}',[ProductosController::class,'quitar_del_carrito'])
    ->middleware('sesionIniciada')    
    ->name('quitarDelCarrito');

Route::get('/perfil/perfil-select',[UsuariosController::class,'perfil_select'])
    ->middleware('sesionIniciada')
    ->name('perfil-select');

Route::get('/perfil/{id}',[UsuariosController::class,'ver_productos_compra'])
    ->middleware('sesionIniciada')
    ->name('verProductosCompra');

    
Route::get('/carrito/{venta}/comprado',[UsuariosController::class,'comprado'])
    ->middleware('sesionIniciada')
    ->name('comprado');
    
Route::post('/carrito/{venta}/completar-compra',[ProductosController::class,'completar_compra'])
    ->middleware('sesionIniciada')
    ->name('completarCompra');

Route::get('/categoria/{nombre}',[SubCategoriasProductosController::class,'sub_categoria_producto'])
    ->name('subCategoriaProducto');