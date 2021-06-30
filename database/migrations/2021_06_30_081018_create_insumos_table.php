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
            $table->string('descripcion');
            $table->double('total',8, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        DB::table("insumos")
            ->insert([
                ["descripcion" => 'carne_picada',"total" => 0],
                ["descripcion" => 'tocino_choriso',"total" => 0],
                ["descripcion" => 'papada',"total" => 0]
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
