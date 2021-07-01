<?php

namespace App\Http\Controllers;

use App\Models\Prod_chorisos;
use App\Models\Prod_productos;
use App\Models\Producto;
use App\Models\Insumos;
use Illuminate\Http\Request;

class ProdChorisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n=0;
        $chorisos=Prod_chorisos::withTrashed()->select('prod_chorisos.*','prod_productos.descripcion as producto')
        ->join('prod_productos','prod_productos.id','=','prod_chorisos.prod_productos_id')
        ->orderby('prod_chorisos.id','desc')->get();
        return view('chorisos.index', compact('chorisos','n'));
    }

    public function create() 
    {
        $n=0;
        $madeja          =  Producto::where('nombre','Madeja')->orwhere('nombre','MADEJA')->orderby('id','asc')->first();
        $prod_productos  =  Prod_productos::orderby('id','asc')->get();
        $insumos         =  Insumos::where('insumos_tipos_id',1)->orderby('id','asc')->get();
        return view('chorisos.create', compact('prod_productos','insumos','madeja','n'));
        
    }

    public function store(Request $request)
    {
        $formulario     = json_decode($request->post('formulario'));
        $cant_procesada = (int) $formulario->cant_procesada;
        $carne_picada   = (int) $formulario->carne_picada;
        $tocino_choriso = (int) $formulario->tocino_choriso;
        $papada         = (int) $formulario->papada;
        $madeja         = (int) $formulario->madeja;
        if($cant_procesada<=0){return 0;}if($carne_picada<=0){return 1;}
        if($tocino_choriso<=0){return 2;}if($papada<=0){return 3;}
        if($madeja<=0){return 4;}

        $corte = new Prod_chorisos;
        $corte->prod_productos_id   = $formulario->salida_producto_id;
        $corte->tocino_choriso      = $formulario->tocino_choriso;
        $corte->papada              = $formulario->papada;
        $corte->carne_picada        = $formulario->carne_picada;
        $corte->madeja              = $formulario->madeja;
        $corte->cantidad_producida  = $formulario->cant_procesada;
        $corte->fecha_reg           = $formulario->fecha_reg;
        $corte->save();

        Prod_productos::where('id' ,$formulario->salida_producto_id)->increment('stock',$formulario->cant_procesada);

        Insumos::where('nombre' ,'carne_picada')->decrement('total',$formulario->carne_picada);
        Insumos::where('nombre' ,'tocino_choriso')->decrement('total',$formulario->tocino_choriso);
        Insumos::where('nombre' ,'papada')->decrement('total',$formulario->papada);
        Producto::where('nombre' ,'madeja')->orwhere('nombre' ,'MADEJA')->decrement('cantidad_inicial',$formulario->papada);
        echo json_encode(5);
    }
    public function show(Prod_chorisos $prod_chorisos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_chorisos  $prod_chorisos
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_chorisos $prod_chorisos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_chorisos  $prod_chorisos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_chorisos $prod_chorisos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_chorisos  $prod_chorisos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_chorisos $prod_chorisos)
    {
        //
    }
}
