<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('prod_productos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->decimal('stock',12, 2)->nullable();
            $table->decimal('cant_salida',12, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table("prod_productos")
            ->insert([
                ["descripcion" => 'CHORISO REGIONAL',"cant_salida" => 0,"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO ARDIENTE',"cant_salida" => 0,"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO FINAS HIERVAS',"cant_salida" => 0,"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO CLASICO',"cant_salida" => 0,"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO CANTONES',"cant_salida" => 0,"stock" => 0]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prod_productos');
    }
}
