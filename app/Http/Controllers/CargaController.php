<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargaController extends Controller
{
    public function index()
    {
        /*$sql = 'SELECT productos.nombre as producto,proveedors.nombre as proveedor, COUNT(materias.producto_id) as cargas, SUM(materias.cantidad) as cantidad
        FROM materias
        INNER JOIN productos ON materias.producto_id = productos.id
        INNER JOIN proveedors ON materias.proveedor_id = proveedors.id
        GROUP BY producto, proveedor
        ORDER BY materias.proveedor_id'
        ;
        $pro = DB::select($sql);*/

        $consulta=Materia::select('productos.nombre as producto','proveedors.nombre as proveedor',
                DB::raw('COUNT(materias.producto_id) as cargas'),
                DB::raw('SUM(materias.cantidad) as cantidad'))
                ->join('productos','productos.id','=','materias.producto_id')
                ->join('proveedors','proveedors.id','=','materias.proveedor_id')
                ->groupBy('producto', 'proveedor')
                ->orderby('materias.proveedor_id')->get();
        
        return view('productosproveedor.index',compact('consulta'));
    }
}
