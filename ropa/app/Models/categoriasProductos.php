<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriasProductos extends Model
{
    use HasFactory;

    public function productos(){
        return $this->hasMany('App\Models\Productos');
    }

    public function sub_categorias_productos(){
        return $this->hasMany('App\Models\SubCategoriasProductos');
    }
}
