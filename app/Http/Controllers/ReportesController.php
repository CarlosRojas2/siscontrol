<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prod_ahumados;
use App\Models\Insumos;

class ReportesController extends Controller
{

    public function productos_Cortes (Request $request)
    {
        $n=1;
        $insumos   =  Insumos::distinct('nombre')->select('descripcion','total')->orderBy('total', 'desc')->get();
        
        return view('reportes.productos_cortes', compact('insumos', 'n'));

    }
}
