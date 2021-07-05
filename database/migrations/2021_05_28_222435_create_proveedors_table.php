<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('numero_ruc')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table("proveedors")
            ->insert([
                ["nombre" => 'MADEJA',"email" => 'madeja@gmail.com',"numero_ruc" => '10203040506','telefono' => '987654321']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
