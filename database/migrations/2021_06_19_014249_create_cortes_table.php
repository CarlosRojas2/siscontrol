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
            $table->date('fecha_reg');
            $table->decimal('brazuelo',12, 2)->nullable();
            $table->decimal('piernas',12, 2)->nullable();
            $table->decimal('chaleco',12, 2)->nullable();
            $table->decimal('cabeza',12, 2)->nullable();
            $table->decimal('patas',12, 2)->nullable();
            $table->decimal('costilla',12, 2)->nullable();
            $table->decimal('carne_picada',12, 2)->nullable();
            $table->decimal('hueso_raspado',12, 2)->nullable();
            $table->decimal('tocino_choriso',12, 2)->nullable();
            $table->decimal('hueso_colum',12, 2)->nullable();
            $table->decimal('cuero',12, 2)->nullable();
            $table->decimal('papada',12, 2)->nullable();
            $table->decimal('carne_cecina',12, 2)->nullable();
            $table->decimal('carne_file',12, 2)->nullable();
            $table->decimal('total',12, 2)->nullable();
            $table->decimal('merma',12, 2)->nullable();
            $table->integer('cantidad');
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
