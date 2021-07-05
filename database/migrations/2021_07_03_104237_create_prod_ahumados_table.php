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
            $table->string('descripcion');
            $table->decimal('carne_cecina',12, 2)->nullable();
            $table->decimal('carne_file',12, 2)->nullable();
            $table->decimal('costilla',12, 2)->nullable();
            $table->decimal('hueso_colum',12, 2)->nullable();
            $table->decimal('hueso_raspado',12, 2)->nullable();
            $table->decimal('cabeza',12, 2)->nullable();
            $table->decimal('patas',12, 2)->nullable();
            $table->decimal('tocino_choriso',12, 2)->nullable();
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
