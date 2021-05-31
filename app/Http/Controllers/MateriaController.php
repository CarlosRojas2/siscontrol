<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Producto;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias=Materia::get();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        $productos = Producto::get();
        
        return view('materias.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $materia = Materia::create($request->all());
        $materia->update(['codigo'=>$materia->id]);
        
        // foreach ($request as $key => $id) {
            $materia->update_stock($request->producto_id);
        // }
        return redirect()->route('materias.index');
    }

    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        $productos = Producto::get();
        return view('materias.edit', compact('materia', 'productos'));
    }

    public function update(Request $request, Materia $materia)
    {
        $materia->update($request->all());
        return redirect()->route('materias.index');
    }

    public function destroy(Materia $materia)
    {
        //
    }
}
