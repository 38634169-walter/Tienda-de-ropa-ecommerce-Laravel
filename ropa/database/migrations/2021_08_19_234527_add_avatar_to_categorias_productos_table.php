<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToCategoriasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias_productos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('subCategoria_ID')->nullable()->after('id');

            $table->foreign('subCategoria_ID')
            ->references('id')
            ->on('sub_categorias_productos')
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
        Schema::table('categorias_productos', function (Blueprint $table) {
            //
        });
    }
}
