<?php

namespace App\Http\Controllers;

use App\Models\Prod_ahumados;
use App\Models\Producto;
use App\Models\Insumos;
use Illuminate\Http\Request;

class ProdahumadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $n=0;
        $ahumados=Prod_ahumados::withTrashed()->select('prod_ahumados.*')
        ->orderby('prod_ahumados.id','desc')->get();
        return view('ahumados.index', compact('ahumados','n'));
    }

    public function create() 
    {
        $n=0;
        $insumos         =  Insumos::where('insumos_tipos_id',2)->orderby('id','asc')->get();
        return view('ahumados.create', compact('insumos','n'));
        
    }

    public function store(Request $request)
    {
        $formulario             = json_decode($request->post('formulario'));
        $cant_procesada         = (int) $formulario->cant_procesada;
        $carne_cecina_resto     = (int) $formulario->carne_cecina_resto;
        $carne_cecina           = (int) $formulario->carne_cecina;
        $carne_file_resto       = (int) $formulario->carne_file_resto;
        $carne_file             = (int) $formulario->carne_file;
        $costilla_resto         = (int) $formulario->costilla_resto;
        $costilla               = (int) $formulario->costilla;
        $hueso_colum_resto      = (int) $formulario->hueso_colum_resto;
        $hueso_colum            = (int) $formulario->hueso_colum;
        $cuero_resto            = (int) $formulario->cuero_resto;
        $cuero                  = (int) $formulario->cuero;
        $hueso_raspado_resto    = (int) $formulario->hueso_raspado_resto;
        $hueso_raspado          = (int) $formulario->hueso_raspado;
        $cabeza_resto           = (int) $formulario->cabeza_resto;
        $cabeza                 = (int) $formulario->cabeza;
        $patas_resto            = (int) $formulario->patas_resto;
        $patas                  = (int) $formulario->patas;
        $tocino_choriso_resto   = (int) $formulario->tocino_choriso_resto;
        $tocino_choriso         = (int) $formulario->tocino_choriso;
        if($cant_procesada<=0)
            {return 0;}
        if($carne_cecina > $carne_cecina_resto or $carne_file > $carne_file_resto or $costilla>$costilla_resto or $hueso_colum>$hueso_colum_resto or $cuero>$cuero_resto or $hueso_raspado>$hueso_raspado_resto or $cabeza>$cabeza_resto or $patas>$patas_resto or $tocino_choriso>$tocino_choriso_resto)
            {return 1;}
        if($carne_cecina<=0 and $carne_file<=0 and $costilla<=0 and $hueso_colum<=0 and $cuero<=0 and $hueso_raspado<=0 and $cabeza<=0 and $patas<=0 and $tocino_choriso<=0)
            {return 2;}

        $corte = new Prod_ahumados;
        $corte->carne_cecina        = $formulario->carne_cecina;
        $corte->carne_file          = $formulario->carne_file;
        $corte->costilla            = $formulario->costilla;
        $corte->hueso_colum         = $formulario->hueso_colum;
        $corte->cuero               = $formulario->cuero;
        $corte->hueso_raspado       = $formulario->hueso_raspado;
        $corte->cabeza              = $formulario->cabeza;
        $corte->patas               = $formulario->patas;
        $corte->tocino_choriso      = $formulario->tocino_choriso;
        $corte->cantidad_producida  = $formulario->cant_procesada;
        $corte->fecha_reg           = $formulario->fecha_reg;
        $corte->descripcion         = $formulario->descripcion;
        $corte->save(); 

        Insumos::where('nombre' ,'carne_cecina')->decrement('total',$formulario->carne_cecina);
        Insumos::where('nombre' ,'carne_file')->decrement('total',$formulario->carne_file);
        Insumos::where('nombre' ,'costilla')->decrement('total',$formulario->costilla);
        Insumos::where('nombre' ,'hueso_colum')->decrement('total',$formulario->hueso_colum);
        Insumos::where('nombre' ,'cuero')->decrement('total',$formulario->cuero);
        Insumos::where('nombre' ,'hueso_raspado')->decrement('total',$formulario->hueso_raspado);
        Insumos::where('nombre' ,'cabeza')->decrement('total',$formulario->cabeza);
        Insumos::where('nombre' ,'patas')->decrement('total',$formulario->patas);
        Insumos::where('nombre' ,'tocino_choriso')->decrement('total',$formulario->tocino_choriso);
        echo json_encode(3);
    }
    public function show($id)
    {
        $consulta=Prod_ahumados::withTrashed()->select('prod_ahumados.*')
        ->where('prod_ahumados.id',$id)->first();
        return view('ahumados.show', compact('consulta'));
    }

    public function edit($id)
    {
        $n=0;
        $hueso_colum          =  Producto::where('nombre','hueso_colum')->orwhere('nombre','hueso_colum')->first();
        $prod_productos  =  Prod_productos::orderby('id','asc')->get();
        $insumos         =  Insumos::where('insumos_tipos_id',1)->orderby('id','asc')->get();
        $ahumados        =  Prod_ahumados::where('id',$id)->first();
        return view('ahumados.edit', compact('hueso_colum','prod_productos','insumos','ahumados','n'));
    }

    public function update(Request $request, Prod_ahumados $prod_ahumados)
    {
        //
    }
    public function destroy($id)
    {
        $producion= Prod_ahumados::where('id',$id)->first();
        Insumos::where('nombre' ,'carne_cecina')->increment('total',$producion->carne_cecina);
        Insumos::where('nombre' ,'carne_file')->increment('total',$producion->carne_file);
        Insumos::where('nombre' ,'costilla')->increment('total',$producion->costilla);
        Insumos::where('nombre' ,'hueso_colum')->increment('total',$producion->hueso_colum);
        Insumos::where('nombre' ,'cuero')->increment('total',$producion->cuero);
        Insumos::where('nombre' ,'hueso_raspado')->increment('total',$producion->hueso_raspado);
        Insumos::where('nombre' ,'cabeza')->increment('total',$producion->cabeza);
        Insumos::where('nombre' ,'patas')->increment('total',$producion->patas);
        Insumos::where('nombre' ,'tocino_choriso')->increment('total',$producion->tocino_choriso);

        Prod_ahumados::find($producion->id)->delete();
        echo '<script type="text/javascript">localStorage.mensaje_codetime="Produción Ahumada anulado con éxito."; window.location ="' . url('prod_ahumados') . '";</script>';
    }
}
