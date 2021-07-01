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
            $table->double('tocino_choriso',8, 2)->nullable();
            $table->double('papada',8, 2)->nullable();
            $table->double('carne_picada',8, 2)->nullable();
            $table->double('madeja',8, 2)->nullable();
            $table->double('cantidad_producida',8, 2)->nullable();
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
