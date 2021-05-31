<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias=Categoria::get();
        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('categorias.create');
    }
    public function store(StoreRequest $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }
    public function update(UpdateRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
