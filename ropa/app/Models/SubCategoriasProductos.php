<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoriasProductos extends Model
{
    use HasFactory;

    public function categorias_productos(){
        return $this->belongsTo('App\Models\categoriasProductos');
    }
}
