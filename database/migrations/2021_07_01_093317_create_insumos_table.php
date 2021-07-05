<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insumos_tipos_id');
            $table->foreign('insumos_tipos_id')->references('id')->on('insumos_tipos');
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('total',12, 2)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('insumos');
    }
}