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
        $unidadmedida2 = new Unidadmedida();
        $unidadmedida2->nombre = "Kg";
        $unidadmedida2->save();

        $unidadmedida = new Unidadmedida();
        $unidadmedida->nombre = "Unid";
        $unidadmedida->save();
    }
}
