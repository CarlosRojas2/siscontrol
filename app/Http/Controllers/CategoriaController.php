<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

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
        return redirect()->route('categorias.index')->with('registrar','ok');
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
        return redirect()->route('categorias.index')->with('editar','ok');
    }
    public function destroy(Categoria $categoria)
    {
        
        $fk =  $categoria->fk_categoriaProducto($categoria->id);
        if($fk == 1)
        {
            return redirect()->route('categorias.index')->with('eliminar','error');
        }else{
            $categoria->delete();
            return redirect()->route('categorias.index')->with('eliminar','ok');
        }
    }
}
