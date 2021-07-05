<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use App\Models\Materia;
use App\Models\Insumos;
use Illuminate\Http\Request;

class CorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n     = 0;
        $corte = Corte::withTrashed()->orderby('id', 'desc')->get();
        return view('corte.index', compact('corte', 'n'));
    }
 
    public function create(){}

    public function crear($id)
    {
        $materia=Materia::where('id',$id)->first();
        return view('corte.create', compact('materia'));
    }
    public function show($id)
    {
        $corte=Corte::withTrashed()->select('cortes.*','proveedors.nombre as proveedor','productos.nombre as producto','categorias.nombre as categoria')
        ->join('materias','materias.id','=','cortes.materia_id')
        ->join('proveedors','proveedors.id','=','materias.proveedor_id')
        ->join('productos','productos.id','=','materias.producto_id')
        ->join('categorias','categorias.id','=','productos.categoria_id')
        ->where('cortes.id',$id)->first();
        return view('corte.show', compact('corte'));
    }

    public function store(Request $request)
    {
        $formulario    = json_decode($request->post('formulario'));
        if($formulario->descripcion=='0'){
            return 0;
        }
        $corte                 = new Corte;
        $corte->materia_id     = $formulario->materia_id;
        $corte->producto       = $formulario->producto;
        $corte->descripcion    = $formulario->descripcion;
        $corte->cantidad_d     = $formulario->cantidad_d;
        $corte->cantidad       = $formulario->cantidad;
        $corte->fecha_reg      = $formulario->fecha_reg;
        $corte->brazuelo       = $formulario->brazuelo;
        $corte->piernas        = $formulario->piernas;
        $corte->chaleco        = $formulario->chaleco;
        $corte->cabeza         = $formulario->cabeza;
        $corte->patas          = $formulario->patas;
        $corte->costilla       = $formulario->costilla;
        $corte->carne_picada   = $formulario->carne_picada;
        $corte->hueso_raspado  = $formulario->hueso_raspado;
        $corte->tocino_choriso = $formulario->tocino_choriso;
        $corte->hueso_colum    = $formulario->hueso_colum;
        $corte->cuero          = $formulario->cuero;
        $corte->papada         = $formulario->papada;
        $corte->carne_cecina   = $formulario->carne_cecina;
        $corte->carne_file     = $formulario->carne_file;
        $corte->total          = $formulario->total;
        $corte->merma          = $formulario->merma;
        $corte->save(); 
        
        Materia::where('id' ,$formulario->materia_id)->decrement('resto',$formulario->cantidad);

        Insumos::where('nombre' ,'carne_picada')->increment('total',$formulario->carne_picada);
        Insumos::where('nombre' ,'tocino_choriso')->increment('total',$formulario->tocino_choriso);
        Insumos::where('nombre' ,'papada')->increment('total',$formulario->papada);
        Insumos::where('nombre' ,'carne_cecina')->increment('total',$formulario->carne_cecina);
        Insumos::where('nombre' ,'carne_file')->increment('total',$formulario->carne_file);
        Insumos::where('nombre' ,'costilla')->increment('total',$formulario->costilla);
        Insumos::where('nombre' ,'hueso_colum')->increment('total',$formulario->hueso_colum);
        Insumos::where('nombre' ,'hueso_raspado')->increment('total',$formulario->hueso_raspado);
        Insumos::where('nombre' ,'cabeza')->increment('total',$formulario->cabeza);
        Insumos::where('nombre' ,'patas')->increment('total',$formulario->patas);

        echo json_encode($corte->id);
    }

    public function edit($id)
    {
        $corte=Corte::where('id',$id)->first();
        $materia=Materia::where('id',$corte->materia_id)->first();
        return view('corte.edit', compact('corte','materia'));
    }

    public function update($opcion,Request $request)
    {
        $formulario = json_decode($request->post('formulario'));
        if($formulario->descripcion=='0'){
            return 0;
        }
        $corte = Corte::where('id',$formulario->corte_id)->first();
        $data =[

                'cantidad'              => $formulario->cantidad,
                'fecha_reg'             => $formulario->fecha_reg,
                'brazuelo'              => $formulario->brazuelo,
                'piernas'               => $formulario->piernas,
                'chaleco'               => $formulario->chaleco,
                'cabeza'                => $formulario->cabeza,
                'patas'                 => $formulario->patas,
                'costilla'              => $formulario->costilla,
                'carne_picada'          => $formulario->carne_picada,
                'hueso_raspado'         => $formulario->hueso_raspado,
                'tocino_choriso'        => $formulario->tocino_choriso,
                'hueso_colum'           => $formulario->hueso_colum,
                'cuero'                 => $formulario->cuero,
                'papada'                => $formulario->papada,
                'carne_cecina'          => $formulario->carne_cecina,
                'carne_file'            => $formulario->carne_file,
                'total'                 => $formulario->total,
                'merma'                 => $formulario->merma
        ];
        Corte::where('id' ,$corte->id)->update($data);

        Materia::where('id' ,$corte->materia_id)->increment('resto',$corte->cantidad);
        Materia::where('id' ,$corte->materia_id)->decrement('resto',$formulario->cantidad);

        Insumos::where('nombre' ,'carne_picada')->decrement('total',$corte->carne_picada);
        Insumos::where('nombre' ,'carne_picada')->increment('total',$formulario->carne_picada);
        Insumos::where('nombre' ,'tocino_choriso')->decrement('total',$corte->tocino_choriso);
        Insumos::where('nombre' ,'tocino_choriso')->increment('total',$formulario->tocino_choriso);
        Insumos::where('nombre' ,'papada')->decrement('total',$corte->papada);
        Insumos::where('nombre' ,'papada')->increment('total',$formulario->papada);
        Insumos::where('nombre' ,'carne_cecina')->decrement('total',$corte->carne_cecina);
        Insumos::where('nombre' ,'carne_cecina')->increment('total',$formulario->carne_cecina);
        Insumos::where('nombre' ,'carne_file')->decrement('total',$corte->carne_file);
        Insumos::where('nombre' ,'carne_file')->increment('total',$formulario->carne_file);
        Insumos::where('nombre' ,'costilla')->decrement('total',$corte->costilla);
        Insumos::where('nombre' ,'costilla')->increment('total',$formulario->costilla);
        Insumos::where('nombre' ,'hueso_colum')->decrement('total',$corte->hueso_colum);
        Insumos::where('nombre' ,'hueso_colum')->increment('total',$formulario->hueso_colum);
        Insumos::where('nombre' ,'hueso_raspado')->decrement('total',$corte->hueso_raspado);
        Insumos::where('nombre' ,'hueso_raspado')->increment('total',$formulario->hueso_raspado);
        Insumos::where('nombre' ,'cabeza')->decrement('total',$corte->cabeza);
        Insumos::where('nombre' ,'cabeza')->increment('total',$formulario->cabeza);
        Insumos::where('nombre' ,'patas')->decrement('total',$corte->patas);
        Insumos::where('nombre' ,'patas')->increment('total',$formulario->patas);


        echo json_encode($opcion);

    }

    public function destroy(Corte $corte)
    {
        
        Materia::where('id' , $corte->materia_id)->increment('resto',$corte->cantidad);

        Insumos::where('nombre' ,'carne_picada')->decrement('total',$corte->carne_picada);
        Insumos::where('nombre' ,'tocino_choriso')->decrement('total',$corte->tocino_choriso);
        Insumos::where('nombre' ,'papada')->decrement('total',$corte->papada);

        Corte::find($corte->id)->delete();
        echo '<script type="text/javascript">localStorage.mensaje_codetime="Corte anulado con éxito."; window.location ="' . url('cortes') . '";</script>';
    }
}
