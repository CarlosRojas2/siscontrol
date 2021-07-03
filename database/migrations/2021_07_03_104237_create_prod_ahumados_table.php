<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdAhumadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_ahumados', function (Blueprint $table) {
            $table->id();
            $table->decimal('cecina',12, 2)->nullable();
            $table->decimal('lomo',12, 2)->nullable();
            $table->decimal('costilla',12, 2)->nullable();
            $table->decimal('hueso',12, 2)->nullable();
            $table->decimal('cuero',12, 2)->nullable();
            $table->decimal('hueso_raspado',12, 2)->nullable();
            $table->decimal('cabeza',12, 2)->nullable();
            $table->decimal('patas',12, 2)->nullable();
            $table->decimal('tocino',12, 2)->nullable();
            $table->decimal('panceta',12, 2)->nullable();
            $table->decimal('cantidad_producida',12, 2)->nullable();
            $table->date('fecha_reg');
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
        Schema::dropIfExists('prod_ahumados');
    }
}
