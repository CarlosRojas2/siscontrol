<?php

namespace App\Http\Controllers;

use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use App\Models\Categoria;
use App\Models\Materia;
use App\Models\Producto;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        $n     = 0;
        $productos=Producto::withTrashed()->orderby('id', 'desc')->get();
        return view('productos.index', compact('productos', 'n'));
    }
    public function create()
    {
        $categorias = Categoria::get();        
        return view('productos.create', compact('categorias'));
    }
    public function store(StoreRequest $request)
    {
        $request->validate(
            [
                'nombre'=>'required',
                'categoria_id'=>'required',
            ]
        );

        Producto::create($request->all());
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
        $estado =  $producto->relacionMateria($producto->id);
        if($estado == 1)
        {
            return redirect()->route('productos.index')->with('eliminar','error');
        }else{
            $producto->delete();
            return redirect()->route('productos.index')->with('eliminar','ok');
        }
    }
    public function inicioreporte(){
        $n = 0;

        $productos=Materia::select('productos.nombre as producto','proveedors.nombre as proveedor',
                DB::raw('COUNT(materias.producto_id) as cargas'),
                DB::raw('SUM(materias.cantidad) as cantidad'),
                DB::raw('SUM(materias.resto) as cantidad_cortada'))
                ->join('productos','productos.id','=','materias.producto_id')
                ->join('proveedors','proveedors.id','=','materias.proveedor_id')
                ->whereDate('materias.created_at', '=', Carbon::today('America/Lima'))
                ->groupBy('producto', 'proveedor')
                ->orderby('materias.proveedor_id')->orderby('proveedors.id', 'desc')->get();
        
        return view('reportes.productos', compact('productos','n'));
    }
    public function reportepro(Request $request){
        $n = 0;
        $desde = $request->desde.' 00:00:00';
        $hasta = $request->hasta.' 23:59:59';

        $productos=Materia::select('productos.nombre as producto','proveedors.nombre as proveedor',
                DB::raw('COUNT(materias.producto_id) as cargas'),
                DB::raw('SUM(materias.cantidad) as cantidad'),
                DB::raw('SUM(materias.resto) as cantidad_cortada'))
                ->join('productos','productos.id','=','materias.producto_id')
                ->join('proveedors','proveedors.id','=','materias.proveedor_id')
                ->whereBetween('materias.created_at', [$desde,$hasta])
                ->groupBy('producto', 'proveedor')
                ->orderby('materias.proveedor_id')->orderby('proveedors.id', 'desc')->get();
        
        return view('reportes.productos', compact('productos','n'));
    }
}
