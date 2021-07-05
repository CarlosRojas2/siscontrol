<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Materia;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Unidadmedida;
use App\Models\User;
use App\Models\Insumos_tipo;
use App\Models\Insumos;
use Illuminate\Support\Facades\Hash;
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

        // categorias
        $categoria = new Categoria();
        $categoria->nombre = "MADEJAS";
        $categoria->save();

        // productos
        $producto = new Producto();
        $producto->nombre = "MADEJA";
        $producto->categoria_id = "1";
        $producto->save();

        // proveedors
        $proveedor = new Proveedor();
        $proveedor->nombre = "MADEJA";
        $proveedor->email = "";
        $proveedor->numero_ruc = "";
        $proveedor->telefono = "";
        $proveedor->save();

        // materias
        $materia = new Materia();
        $materia->usuario_id = 1;
        $materia->producto_id = 1;
        $materia->proveedor_id = 1;
        $materia->unidadmedida_id = 1;
        $materia->cantidad = 0;
        $materia->precio_compra = 0;
        $materia->importe = 0;
        $materia->resto = 0;
        $materia->save();

        // users
        $user = new User();
        $user->name = "CODETIME";
        $user->email = "codetime@gmail.com";
        $user->password = Hash::make("codetime2021.");
        $user->save();

        // Tipos de insumos
        $insumos_tipo = new Insumos_tipo();
        $insumos_tipo->nombre = "chorisos";
        $insumos_tipo->descripcion = "CHORISOS";
        $insumos_tipo->save();

        $insumos_tipo = new Insumos_tipo();
        $insumos_tipo->nombre = "ahumados";
        $insumos_tipo->descripcion = "AHUMADOS";
        $insumos_tipo->save();

        // insumos
        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "1";
        $insumos->nombre = "carne_picada";
        $insumos->descripcion = "Carne Picada";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "1";
        $insumos->nombre = "tocino_choriso";
        $insumos->descripcion = "Tocino Choriso";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "1";
        $insumos->nombre = "papada";
        $insumos->descripcion = "Papada";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "carne_cecina";
        $insumos->descripcion = "Cecina";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "carne_file";
        $insumos->descripcion = "Lomo";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "costilla";
        $insumos->descripcion = "Costilla";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "hueso_colum";
        $insumos->descripcion = "Hueso";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "hueso_raspado";
        $insumos->descripcion = "Hueso Raspado";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "cabeza";
        $insumos->descripcion = "Cabeza";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "patas";
        $insumos->descripcion = "Patas";
        $insumos->total = 0;
        $insumos->save();

        $insumos = new Insumos();
        $insumos->insumos_tipos_id = "2";
        $insumos->nombre = "tocino_choriso";
        $insumos->descripcion = "Tocino";
        $insumos->total = 0;
        $insumos->save();

    }
}
