<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use App\Models\Materia;
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
        //
    }

    public function create()
    {
       
    }

    public function show($id)
    {
        $materia=Materia::where('id',$id)->first();
        return view('corte.create', compact('materia'));
    }

    public function store(Request $request)
    {
        $formulario    = json_decode($request->post('formulario'));

        $corte = new Corte;
        $corte->materia_id      = $formulario->materia_id;
        $corte->producto        = $formulario->producto;
        $corte->descripcion     = $formulario->descripcion;
        $corte->cantidad        = $formulario->cantidad;
        $corte->fecha_reg       = $formulario->fecha_reg;
        $corte->brazuelo        = $formulario->brazuelo;
        $corte->piernas         = $formulario->piernas;
        $corte->chaleco         = $formulario->chaleco;
        $corte->cabeza          = $formulario->cabeza;
        $corte->patas           = $formulario->patas;
        $corte->pulpa_carne     = $formulario->pulpa_carne;
        $corte->pulpa_file      = $formulario->pulpa_file;
        $corte->costilla        = $formulario->costilla;
        $corte->carne_picada    = $formulario->carne_picada;
        $corte->hueso_raspado   = $formulario->hueso_raspado;
        $corte->tocino_choriso  = $formulario->tocino_choriso;
        $corte->hueso_colum     = $formulario->hueso_colum;
        $corte->cuero           = $formulario->cuero;
        $corte->papada          = $formulario->papada;
        $corte->carne_cecina    = $formulario->carne_cecina;
        $corte->carne_file      = $formulario->carne_file;
        $corte->total           = $formulario->total;
        $corte->merma           = $formulario->merma;
        $corte->save();
        echo json_encode($corte->id);
    }

    public function edit(Corte $corte)
    {
        //
    }

    public function update(Request $request, Corte $corte)
    {
        //
    }

    public function destroy(Corte $corte)
    {
        //
    }
}
