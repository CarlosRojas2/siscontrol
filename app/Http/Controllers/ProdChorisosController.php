<?php

namespace App\Http\Controllers;

use App\Models\Prod_chorisos;
use App\Models\Prod_productos; 
use App\Models\Materia;
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
        $madeja          =  Materia::select('materias.*','productos.nombre')
                            ->join('productos','productos.id','=','materias.producto_id')
                            ->where('productos.nombre','Madeja')->orwhere('productos.nombre','MADEJA')
                            ->first();
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
        $corte->madeja_id           = $formulario->id_materia;
        $corte->cantidad_producida  = $formulario->cant_procesada;
        $corte->fecha_reg           = $formulario->fecha_reg;
        $corte->save();

        Prod_productos::where('id' ,$formulario->salida_producto_id)->increment('stock',$formulario->cant_procesada);

        Insumos::where('nombre' ,'carne_picada')->decrement('total',$formulario->carne_picada);
        Insumos::where('nombre' ,'tocino_choriso')->decrement('total',$formulario->tocino_choriso);
        Insumos::where('nombre' ,'papada')->decrement('total',$formulario->papada);
        Materia::where('id' ,$formulario->id_materia)->decrement('resto',$formulario->madeja);
        echo json_encode(5);
    }
    public function show($id)
    {
        $consulta=Prod_chorisos::withTrashed()->select('prod_chorisos.*','prod_productos.descripcion as producto')
        ->join('prod_productos','prod_productos.id','=','prod_chorisos.prod_productos_id')
        ->where('prod_chorisos.id',$id)->first();
        return view('chorisos.show', compact('consulta'));
    }

    public function edit($id)
    {
        $n=0;
        $madeja          =  Producto::where('nombre','Madeja')->orwhere('nombre','MADEJA')->first();
        $prod_productos  =  Prod_productos::orderby('id','asc')->get();
        $insumos         =  Insumos::where('insumos_tipos_id',1)->orderby('id','asc')->get();
        $chorisos        =  Prod_chorisos::where('id',$id)->first();
        return view('chorisos.edit', compact('madeja','prod_productos','insumos','chorisos','n'));
    }

    public function update(Request $request, Prod_chorisos $prod_chorisos)
    {
        //
    }
    public function destroy($id)
    {
        $producion= Prod_chorisos::where('id',$id)->first();
        Prod_productos::where('id' ,$producion->prod_productos_id)->decrement('stock',$producion->cantidad_producida);

        Insumos::where('nombre' ,'carne_picada')->increment('total',$producion->carne_picada);
        Insumos::where('nombre' ,'tocino_choriso')->increment('total',$producion->tocino_choriso);
        Insumos::where('nombre' ,'papada')->increment('total',$producion->papada);
        Materia::where('id' ,$producion->madeja_id)->increment('resto',$producion->madeja);

        Prod_chorisos::find($producion->id)->delete();
        echo '<script type="text/javascript">localStorage.mensaje_codetime="Corte anulado con éxito."; window.location ="' . url('cortes') . '";</script>';
    }
}
