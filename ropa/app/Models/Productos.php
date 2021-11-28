<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public function detalles_ventas(){
        return $this->hasMany('App\Models\DetallesVentas');
    }

    public function categorias_productos(){
        return $this->belongsTo('App\Models\categoriasProductos');
    }
}
