<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposPagos extends Model
{
    use HasFactory;

    public function ventas(){
        return $this->hasMany('App\Models\Ventas');
    }
}
