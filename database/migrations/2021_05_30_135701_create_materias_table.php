<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique()->nullable();

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            
            $table->unsignedBigInteger('unidadmedida_id');
            $table->foreign('unidadmedida_id')->references('id')->on('unidadmedidas');

            $table->integer('cantidad');
            $table->decimal('precio_compra', 12, 2);
            $table->decimal('importe', 12, 2);
            $table->decimal('resto', 12, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table("materias")
        ->insert([
            ["producto_id" => 1,"producto_id" => 1,"proveedor_id" => 1,"unidadmedida_id" => 2,"cantidad" => 0,"precio_compra" => 0,"importe" => 0,'resto' => 0]
    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
