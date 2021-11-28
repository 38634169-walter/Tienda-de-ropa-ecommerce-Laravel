<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    public function detalles_ventas(){
        return $this->hasMany('App\Models\DetallesVentas');
    }

    public function tipos_pagos(){
        return $this->belongsTo('App\Models\TiposPagos');
    }

    public function usuarios(){
        return $this->belongsTo('App\Models\Usuarios');
    }
}
