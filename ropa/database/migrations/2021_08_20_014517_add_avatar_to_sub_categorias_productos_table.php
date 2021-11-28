<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToSubCategoriasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_categorias_productos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('categoriaProducto_ID')->nullable()->after('id');

            $table->foreign('categoriaProducto_ID')
            ->references('id')
            ->on('categorias_productos')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_categorias_productos', function (Blueprint $table) {
            //
        });
    }
}
