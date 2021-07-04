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
        
        DB::table("insumos")
            ->insert([
                ["insumos_tipos_id"=> 1,"nombre" => 'carne_picada',"descripcion" => 'Carne Picada',"total" => 0],
                ["insumos_tipos_id"=> 1,"nombre" => 'tocino_choriso',"descripcion" => 'Tocino Choriso',"total" => 0],
                ["insumos_tipos_id"=> 1,"nombre" => 'papada',"descripcion" => 'Papada',"total" => 0],

                ["insumos_tipos_id"=> 2,"nombre" => 'carne_cecina',"descripcion" => 'Cecina',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'carne_file',"descripcion" => 'Lomo',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'costilla',"descripcion" => 'Costilla',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'hueso_colum',"descripcion" => 'Hueso',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'hueso_raspado',"descripcion" => 'Hueso Raspado',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'cabeza',"descripcion" => 'Cabeza',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'patas',"descripcion" => 'Patas',"total" => 0],
                ["insumos_tipos_id"=> 2,"nombre" => 'tocino_choriso',"descripcion" => 'Tocino',"total" => 0]
        ]);
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