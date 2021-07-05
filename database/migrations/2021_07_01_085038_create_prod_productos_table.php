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
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table("prod_productos")
            ->insert([
                ["descripcion" => 'CHORISO REGIONAL',"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO ARDIENTE',"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO FINAS HIERVAS',"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO CLASICO',"stock" => 0],
                ["descripcion" => 'CHORISO PARRILLERO CANTONES',"stock" => 0]
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
