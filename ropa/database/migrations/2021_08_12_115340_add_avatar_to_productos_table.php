<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            
            $table->unsignedBigInteger('subCategoria_id')->nullable()->after('estadoProd');

            $table->foreign('subCategoria_id')
                ->references('id')
                ->on('sub_categorias_productos')
                ->onDelete('set null')
                ->onUpdate('cascade');
            /*
            $table->string('imagen3')->nullable()->after('imagenProd');
            $table->string('imagen2')->nullable()->after('imagenProd');
            */
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            //
            /*
            $table->dropColumn('categoria_id');
            */
        });
    }
}
