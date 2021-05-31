<?php

namespace App\Http\Controllers;

use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductoController extends Controller
{public function index()
    {
        $productos=Producto ::get();
        return view('productos.index', compact('productos'));
    }
    public function create()
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        
        return view('productos.create', compact('categorias', 'proveedors'));
    }
    public function store(StoreRequest $request)
    {
        // $producto = new Producto();
        // $producto->codigo = $producto->id;
        // $producto->nombre = $request->nombre;
        // $producto->categoria_id = $request->categoria_id;
        // $producto->proveedor_id = $request->proveedor_id;

        // print_r($producto);
        // exit();
        // $producto->save();

        $producto = Producto::create($request->all());
        $producto->update(['codigo'=>$producto->id]);
        return redirect()->route('productos.index');
    }
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }
    public function edit(Producto $producto)
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        return view('productos.edit', compact('producto', 'categorias', 'proveedors'));
    }
    public function update(UpdateRequest $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('eliminar','ok');
    }
    // public function codigo(){
    //     $productos = Producto::get();
    //     return json_encode($productos);
    // }
}
