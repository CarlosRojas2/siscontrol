<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargaController extends Controller
{
    public function index()
    {
        $sql = 'SELECT materias.producto_id,materias.proveedor_id, producto.nombre as pro, COUNT(materias.producto_id) as cargas, SUM(materias.cantidad) as cant
        FROM materias
        INNER JOIN productos ON materias.producto_id = productos.id
        INNER JOIN proveedors ON materias.proveedor_id = proveedors.id
        GROUP BY producto_id, proveedor_id
        ORDER BY materias.proveedor_id'
        ;
        $pro = DB::select($sql);
        // $pro = DB::table('materias')
        //     ->join('productos', 'materias.producto_id', '=', 'productos.id')
        //     ->join('proveedors', 'materias.proveedor_id', '=', 'proveedors.id')
        //     ->select('materias.producto_id', 'materias.proveedor_id', 'productos.nombre as pro', 'proveedors.nombre as proveed')
        //     // ->groupBy('proveedor_id','producto_id')
        //     ->get();
        dd($pro);
        return view('productosproveedor.index', ['pro' => $pro]);
    }
}
