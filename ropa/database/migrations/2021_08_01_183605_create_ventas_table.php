<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->date('fechaPedido');
            $table->unsignedBigInteger('tipoPago_id')->nullable();
            $table->string('direccionEntrega');
            $table->integer('telefonoEntrega');
            $table->integer('estadoEntrega');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios')
                ->onDelete('set null')
                ->onUpdate('cascade');
            
            $table->foreign('tipoPago_id')
                ->references('id')
                ->on('tipos_pagos')
                ->onDelete('set null')
                ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
