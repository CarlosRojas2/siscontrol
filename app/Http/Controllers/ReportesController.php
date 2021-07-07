<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prod_ahumados;
use DB;

class ReportesController extends Controller
{

    public function productos_Cortes (Request $request)
    {
        $n=1;
        $insumos   =  DB::table('insumos')->where('id','!=',12)->get();
        
        return view('reportes.productos_cortes', compact('insumos', 'n'));

    }
}
