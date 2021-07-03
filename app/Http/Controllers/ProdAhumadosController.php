<?php

namespace App\Http\Controllers;

use App\Models\Prod_Ahumados;
use App\Models\Prod_productos; 
use App\Models\Producto;
use App\Models\Insumos;
use Illuminate\Http\Request;

class ProdAhumadosController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n=0;
        $prod_productos  =  Prod_productos::orderby('id','asc')->get();
        $insumos         =  Insumos::where('insumos_tipos_id',2)->orderby('id','asc')->get();
        return view('ahumados.create', compact('prod_productos','insumos','n'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formulario     = json_decode($request->post('formulario'));
        $cant_procesada = (int) $formulario->cant_procesada;
        $cecina         = (int) $formulario->cecina;
        $lomo           = (int) $formulario->lomo;
        $costilla       = (int) $formulario->costilla;
        $hueso          = (int) $formulario->hueso;
        $cuero          = (int) $formulario->cuero;
        $hueso_raspado  = (int) $formulario->hueso_raspado;
        $cabeza         = (int) $formulario->cabeza;
        $patas          = (int) $formulario->patas;
        $tocino         = (int) $formulario->tocino;
        $panceta        = (int) $formulario->panceta;
        if($cant_procesada<=0){return 0;}if($cecina<=0){return 1;}
        if($lomo<=0){return 2;}if($costilla<=0){return 3;}if($hueso<=0){return 4;}
        if($cuero<=0){return 5;}if($hueso_raspado<=0){return 6;}if($cabeza<=0){return 7;}
        if($patas<=0){return 8;}if($tocino<=0){return 9;}if($panceta<=0){return 10;}

        $corte = new Prod_ahumado;
        $corte->cecina              = $formulario->cecina;
        $corte->lomo                = $formulario->lomo;
        $corte->costilla            = $formulario->costilla;
        $corte->hueso               = $formulario->hueso;
        $corte->cuero               = $formulario->cuero;
        $corte->hueso_raspado       = $formulario->hueso_raspado;
        $corte->cabeza              = $formulario->cabeza;
        $corte->patas               = $formulario->patas;
        $corte->tocino              = $formulario->tocino;
        $corte->panceta             = $formulario->panceta;
        $corte->cantidad_producida  = $formulario->cant_procesada;
        $corte->fecha_reg           = $formulario->fecha_reg;
        $corte->save();

        Insumos::where('nombre' ,'cecina')->decrement('total',$formulario->cecina);
        Insumos::where('nombre' ,'lomo')->decrement('total',$formulario->lomo);
        Insumos::where('nombre' ,'costilla')->decrement('total',$formulario->costilla);
        Insumos::where('nombre' ,'hueso')->decrement('total',$formulario->hueso);
        Insumos::where('nombre' ,'cuero')->decrement('total',$formulario->cuero);
        Insumos::where('nombre' ,'hueso_raspado')->decrement('total',$formulario->hueso_raspado);
        Insumos::where('nombre' ,'cabeza')->decrement('total',$formulario->cabeza);
        Insumos::where('nombre' ,'patas')->decrement('total',$formulario->patas);
        Insumos::where('nombre' ,'tocino')->decrement('total',$formulario->tocino);
        Insumos::where('nombre' ,'panceta')->decrement('total',$formulario->panceta);
        echo json_encode(5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prod_Ahumados  $prod_Ahumados
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_Ahumados $prod_Ahumados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_Ahumados  $prod_Ahumados
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_Ahumados $prod_Ahumados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_Ahumados  $prod_Ahumados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_Ahumados $prod_Ahumados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_Ahumados  $prod_Ahumados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_Ahumados $prod_Ahumados)
    {
        //
    }
}
