<?php

namespace Database\Seeders;

use App\Models\Unidadmedida;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $unidadmedida = new Unidadmedida();
        $unidadmedida->nombre = "UNIDAD";
        $unidadmedida->save();

        $unidadmedida2 = new Unidadmedida();
        $unidadmedida2->nombre = "KG";
        $unidadmedida2->save();
    }
}
