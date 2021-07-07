<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prod_chorisos;
use App\Models\Prod_productos; 
use App\Models\Materia;
use App\Models\Insumos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(isset(Auth::user()->name)){
            $n_p = 1;
            $n_c = 1;
            $n_i = 1;
            $madeja= Prod_chorisos::select(DB::raw('SUM(madeja) as can_cortada'))->first();
            $productos=Materia::select('unidadmedidas.nombre as uni_medida','productos.id as productos_id','productos.nombre as producto','proveedors.nombre as proveedor',
                    DB::raw('COUNT(materias.producto_id) as cargas'),
                    DB::raw('SUM(materias.cantidad) as cantidad'),
                    DB::raw('SUM(materias.resto) as cantidad_cortada'))
                    ->join('productos','productos.id','=','materias.producto_id')
                    ->join('proveedors','proveedors.id','=','materias.proveedor_id')
                    ->join('unidadmedidas','unidadmedidas.id','=','materias.unidadmedida_id')
                    ->groupBy('producto', 'proveedor','productos_id','uni_medida')
                    ->orderby('materias.proveedor_id')->orderby('proveedors.id', 'desc')->get();

            $chorisos = Prod_productos::get();
            $insumos  = Insumos::select('descripcion','total')->distinct()->orderBy('total', 'desc')->get(['nombre']);
            return view('dashboard',compact('productos','chorisos','insumos','n_i','n_p','n_c','madeja')); 
        }
        return redirect()->route('login'); 
    }
}
