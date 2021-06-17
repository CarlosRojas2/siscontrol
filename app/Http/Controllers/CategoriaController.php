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
        orderBy('id', 'asc')
        ->get();
        return view('categorias.index', ['categorias'=>$categorias])->with('n',$n);
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
        $categoria->save();
        flash::success('La categoria fue registrada con éxito');
        return redirect ('/categorias');
    }
    public function show(Categoria $categoria)
    {
        return view('categorias.show',['categoria'=>$categoria]);
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
        
        $categoria->delete();
        flash::error('La categoria fue eliminada con éxito');
        return redirect('/categorias');
    }
}
