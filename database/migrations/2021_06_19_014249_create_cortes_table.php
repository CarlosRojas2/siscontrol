<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materia_id');
            $table->string('producto');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->string('descripcion');
            $table->integer('cantidad_d');
            $table->integer('cantidad');
            $table->date('fecha_reg');
            $table->double('brazuelo',8, 2)->nullable();
            $table->double('piernas',8, 2)->nullable();
            $table->double('chaleco',8, 2)->nullable();
            $table->double('cabeza',8, 2)->nullable();
            $table->double('patas',8, 2)->nullable();
            $table->double('costilla',8, 2)->nullable();
            $table->double('carne_picada',8, 2)->nullable();
            $table->double('hueso_raspado',8, 2)->nullable();
            $table->double('tocino_choriso',8, 2)->nullable();
            $table->double('hueso_colum',8, 2)->nullable();
            $table->double('cuero',8, 2)->nullable();
            $table->double('papada',8, 2)->nullable();
            $table->double('carne_cecina',8, 2)->nullable();
            $table->double('carne_file',8, 2)->nullable();
            $table->double('total',8, 2)->nullable();
            $table->double('merma',8, 2)->nullable();
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
        Schema::dropIfExists('cortes');
    }
}
