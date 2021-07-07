<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prod_ahumados;
use DB;

class ReportesController extends Controller
{

    public function productos_Cortes (Request $request)
    {
        $n=0;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        $carne_picada   =  DB::table('insumos')->where('nombre','carne_picada')->sum('total');
        $papada         =  DB::table('insumos')->where('nombre','papada')->sum('total');
        $carne_cecina   =  DB::table('insumos')->where('nombre','carne_cecina')->sum('total');
        $carne_file     =  DB::table('insumos')->where('nombre','carne_file')->sum('total');
        $costilla       =  DB::table('insumos')->where('nombre','costilla')->sum('total');
        $hueso_colum    =  DB::table('insumos')->where('nombre','hueso_colum')->sum('total');
        $cuero          =  DB::table('insumos')->where('nombre','cuero')->sum('total');
        $hueso_raspado  =  DB::table('insumos')->where('nombre','hueso_raspado')->sum('total');
        $cabeza         =  DB::table('insumos')->where('nombre','cabeza')->sum('total');
        $patas          =  DB::table('insumos')->where('nombre','patas')->sum('total');
        $tocino_choriso =  DB::table('insumos')->where('insumos_tipos_id',1)->where('nombre','tocino_choriso')->sum('total');
        
        
        if ($fecha_fin >=$fecha_inicio ) {
            return view('reportes.productos_cortes')->with('n',$n)
                ->with('carne_picada',$carne_picada)
                ->with('papada',$papada)
                ->with('carne_cecina',$carne_cecina)
                ->with('carne_file',$carne_file)
                ->with('costilla',$costilla)
                ->with('hueso_colum',$hueso_colum)
                ->with('cuero',$cuero)
                ->with('hueso_raspado',$hueso_raspado)
                ->with('cabeza',$cabeza)
                ->with('patas',$patas)
                ->with('tocino_choriso',$tocino_choriso)
                ->with('fecha_inicio',$fecha_inicio)
                ->with('fecha_fin',$fecha_fin);
        }
        else
        {
            return redirect('/reportes_ahumados')->with('reporte','error');
        }
    }
}
