<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdChorisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_chorisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prod_productos_id');
            $table->foreign('prod_productos_id')->references('id')->on('prod_productos');
            $table->decimal('tocino_choriso',12, 2)->nullable();
            $table->decimal('papada',12, 2)->nullable();
            $table->decimal('carne_picada',12, 2)->nullable();
            $table->decimal('madeja',12, 2)->nullable();
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
        Schema::dropIfExists('prod_chorisos');
    }
}
