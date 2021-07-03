<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique()->nullable();
            $table->string('nombre')->unique();
            $table->integer('stock')->default(0);
            $table->enum('estado',['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->integer('cantidad_inicial')->default(0);
            $table->integer('cantidad_cortada')->default(0);
            $table->integer('cantidad_restante')->default(0);
            $table->integer('cantidad_merma')->default(0);
            
            $table->softDeletes();
            $table->timestamps();
        });

        
        DB::table("productos")
            ->insert([
                ["nombre" => 'MADEJA',"categoria_id" => '1']
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
