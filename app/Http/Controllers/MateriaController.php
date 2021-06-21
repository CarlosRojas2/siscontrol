<?php
namespace App\Http\Controllers;
use App\Models\Materia;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    public function index()
    {
        $materias=Materia::get();
        return view('materias.index', compact('materias'));
    }
    public function create()
    {
        $proveedors = Proveedor::get();
        $productos = Producto::get();
        return view('materias.create', compact('productos', 'proveedors'));
    }
    public function store(Request $request)
    {
        $materia = Materia::create($request->all());
        $materia->update(['codigo'=>$materia->id]);
            $materia->update_stock($request->producto_id, $request->cantidad);
        return redirect()->route('materias.index');
    }
    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }
    public function edit(Materia $materia)
    {
        $proveedors = Proveedor::get();
        $productos = Producto::get();
        return view('materias.edit', compact('materia', 'productos', 'proveedors'));
    }
    public function update(Request $request, Materia $materia)
    {
        $materia->producto_stock($request->producto_id, $request->refe_pro, $request->cantidad);
        $materia->update($request->all());
        return redirect()->route('materias.index');
    }
    public function destroy(Materia $materia)
    {
        //
    }
    
}
