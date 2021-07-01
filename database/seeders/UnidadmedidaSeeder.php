<?php

namespace Database\Seeders;

use App\Models\Unidadmedida;
use Illuminate\Database\Seeder;

class UnidadmedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidadmedida = new Unidadmedida();
        $unidadmedida->nombre = "UNIDAD";
        $unidadmedida->save();

        $unidadmedida2 = new Unidadmedida();
        $unidadmedida2->nombre = "KG";
        $unidadmedida2->save();
    }
}
