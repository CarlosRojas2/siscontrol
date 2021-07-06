<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadmedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadmedidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
<<<<<<< HEAD

=======
>>>>>>> 691648bb15853a9f53cee09b6c0f87489214934a
    }
    /**
     * Reverse 
     * the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidadmedidas');
    }
}
