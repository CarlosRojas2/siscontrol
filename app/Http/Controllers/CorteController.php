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
        $n     = 0;
        $corte = Corte::withTrashed()->orderby('id', 'desc')->get();
        return view('corte.index', compact('corte', 'n'));
    }

    public function create()
    {

    }

    public function show($id)
    {
        $materia = Materia::where('id', $id)->first();
        return view('corte.create', compact('materia'));
    }

    public function store(Request $request)
    {
        $formulario = json_decode($request->post('formulario'));
        if ($formulario->descripcion == '0') {
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

        $resto = $formulario->cantidad_d - $formulario->cantidad;
        Materia::withTrashed()->where('id', $formulario->materia_id)->update(['resto' => $resto]);

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

        Materia::where('id', $corte->materia_id)->increment('resto', $corte->cantidad);
        Corte::find($corte->id)->delete();
        echo '<script type="text/javascript">localStorage.mensaje_codetime="Corte anulado con éxito."; window.location ="' . url('cortes') . '";</script>';
    }
}
