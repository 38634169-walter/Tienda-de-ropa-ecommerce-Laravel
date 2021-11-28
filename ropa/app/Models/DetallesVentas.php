<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesVentas extends Model
{
    use HasFactory;
    public function ventas(){
        return $this->belongsTo('App\Models\Ventas');
    }
    
    public function productos(){
        return $this->belongsTo('App\Models\Productos');
    }
}
