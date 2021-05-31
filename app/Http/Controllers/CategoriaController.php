<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoriaController extends Controller
{
    public function index()
    {
        $n=1;
        
        $categorias=Categoria::
        where('estado','=','1')
        ->orderBy('id', 'asc')
        ->get();
        $cont= count($categorias);
        return view('categorias.index', ['categorias'=>$categorias])->with('n',$n)->with('cont',$cont);
    }
    public function create()
    {
        return view('categorias.create');
    }
    public function store(StoreRequest $request)
    {
        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = '1';
        $categoria->save();
        flash::success('La categoria fue registrada con éxito');
        return redirect ('/categorias');
    }
    public function show(Categoria $categoria)
    {
        
    }
    public function edit( Categoria $categoria)
    {   
        return view('categorias.edit',['categoria'=>$categoria]);
    }
    public function update(UpdateRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->update();
        flash::warning('La categoria fue actualizada con éxito');
        return redirect ('/categorias');
    }
    public function destroy(Categoria $categoria)
    {
        
        $categoria->estado = '0';
        $categoria->update();
        flash::error('La categoria fue eliminada con éxito');
        return redirect('/categorias');
    }
}
