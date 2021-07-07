<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prod_ahumados;
use DB;

class ReportsProdAhumadosController extends Controller
{
    public function ahumados()
    {
        $n=0;
        $carne_cecina =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('carne_cecina');
        $carne_file =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('carne_file');
        $costilla =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('costilla');
        $hueso_colum =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('hueso_colum');
        $cuero =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('cuero');
        $hueso_raspado =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('hueso_raspado');      
        $cabeza =  DB::table('Prod_ahumados')->where('deleted_at',null)->where('deleted_at',null)->sum('cabeza');
        $patas =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('patas');
        $tocino_choriso =  DB::table('Prod_ahumados')->where('deleted_at',null)->sum('tocino_choriso');
        // DD($carne_cecina);
        return view('reportes_ahumados.index')->with('n',$n)
                ->with('carne_cecina',$carne_cecina)
                ->with('carne_file',$carne_file)
                ->with('costilla',$costilla)
                ->with('hueso_colum',$hueso_colum)
                ->with('cuero',$cuero)
                ->with('hueso_raspado',$hueso_raspado)
                ->with('cabeza',$cabeza)
                ->with('patas',$patas)
                ->with('tocino_choriso',$tocino_choriso);
    }

    public function result_ahumados (Request $request)
    {
        $n=0;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        $carne_cecina =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('carne_cecina');
        $carne_file =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('carne_file');
        $costilla =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('costilla');
        $hueso_colum =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('hueso_colum');
        $cuero =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('hueso_colum');
        $hueso_raspado =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('hueso_raspado');      
        $cabeza =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('cabeza');
        $patas =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('patas');
        $tocino_choriso =  DB::table('Prod_ahumados')->where('deleted_at',null)->whereBetween('fecha_reg',[$request->fecha_inicio . ' 00:00:00',$request->fecha_fin . ' 23:59:59'])->sum('tocino_choriso');
        
        
        if ($fecha_fin >=$fecha_inicio ) {
            return view('reportes_ahumados.result_ahumados')->with('n',$n)
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
