<?php

namespace App\Http\Controllers;

use App\Models\Prod_chorisos;
use App\Models\Prod_productos; 
use App\Models\Materia;
use App\Models\Producto;
use App\Models\Insumos;
use App\Models\Salida;
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
        $madeja          =  Producto::where('id',1)->first();
        $prod_productos  =  Prod_productos::orderby('id','asc')->get();
        $insumos         =  Insumos::where('insumos_tipos_id',1)->orderby('id','asc')->get();
        return view('chorisos.create', compact('prod_productos','insumos','madeja','n'));
        
    }

    public function store(Request $request)
    {
        $formulario             = json_decode($request->post('formulario'));
        $cant_procesada         = (int) $formulario->cant_procesada;
        $carne_picada_resto     = (int) $formulario->carne_picada_resto;
        $carne_picada           = (int) $formulario->carne_picada;
        $tocino_choriso_resto   = (int) $formulario->tocino_choriso_resto;
        $tocino_choriso         = (int) $formulario->tocino_choriso;
        $papada_resto           = (int) $formulario->papada_resto;
        $papada                 = (int) $formulario->papada;
        $madeja_resto           = (int) $formulario->madeja_resto;
        $madeja                 = (int) $formulario->madeja;
        if($cant_procesada<=0)
            {return 0;}
        if($carne_picada > $carne_picada_resto or $tocino_choriso > $tocino_choriso_resto or $papada>$papada_resto)
            {return 4;}
        if($carne_picada<=0 and $tocino_choriso<=0 and $papada<=0)
            {return 1;}
        if($madeja<=0 or $madeja >$madeja_resto)
            {return 2;}

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
        Producto::where('id' ,1)->decrement('cantidad_inicial',$formulario->madeja);
        echo json_encode(3);
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
        Producto::where('id' ,1)->increment('cantidad_inicial',$producion->madeja);

        Prod_chorisos::find($producion->id)->delete();
        echo '<script type="text/javascript">localStorage.mensaje_codetime="Corte anulado con éxito."; window.location ="' . url('cortes') . '";</script>';
    }
    public function prodChorisos(Request $request){

        $n=1;
        if($request->desde ==1 and $request->hasta==1){
            $consulta = Prod_chorisos::withTrashed()->select('prod_chorisos.*','prod_productos.descripcion as producto')
                        ->join('prod_productos','prod_productos.id','=','prod_chorisos.prod_productos_id')
                        ->orderby('prod_chorisos.id','desc')->get();
            $desde='';
            $hasta='';
        }else{
            $consulta = Prod_chorisos::withTrashed()->select('prod_chorisos.*','prod_productos.descripcion as producto')
                        ->join('prod_productos','prod_productos.id','=','prod_chorisos.prod_productos_id')
                        ->whereBetween('prod_chorisos.fecha_reg', [$request->desde,$request->hasta])
                        ->orderby('prod_chorisos.id','desc')->get();
            $desde=$request->desde;
            $hasta=$request->hasta;
        }
        return view('reportes.prodChorisos', compact('consulta','n','desde','hasta'));
    }
    public function chorisos(Request $request){
        $n=1;
        $consulta = Prod_productos::get();
        return view('reportes.chorisos', compact('consulta','n'));
    }
    public function salida_chorisos(Request $request){
        $n=1;
        $consulta = Prod_productos::get();
        return view('salidas.chorisos', compact('consulta','n'));
    }
    public function salir_chorisos(Request $request){
        

        $corte = new Salida;
        $corte->prod_productos_id   = $request->id_choriso;
        $corte->cant_salida         = $request->cant_salida;
        $corte->save(); 

        Prod_productos::where('id' ,$request->id_choriso)->decrement('stock',$request->cant_salida);
        Prod_productos::where('id' ,$request->id_choriso)->increment('cant_salida',$request->cant_salida);
        echo '<script type="text/javascript">localStorage.mensaje_codetime="Salida realizada con éxito."; window.location ="' . url('salidas/salida_chorisos') . '";</script>';
    }
}
