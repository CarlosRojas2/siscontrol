<?php
namespace App\Http\Controllers;
use App\Models\Materia;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Unidadmedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MateriaController extends Controller
{
    public function index() 
    {
        $n     = 0;
        $materias=Materia::withTrashed()->orderby('id', 'desc')->get();
        return view('materias.index', compact('materias', 'n'));
    }
    public function create()
    {
        $proveedors = Proveedor::get();
        $productos = Producto::get();
        $unidadmedida = Unidadmedida::get();

        return view('materias.create', compact('productos', 'proveedors', 'unidadmedida'));
    }
    public function store(Request $request)
    {
        $materia = Materia::create($request->all());
        $materia->update(['codigo'=>$materia->id, 'resto'=>$materia->cantidad, 'usuario_id'=>Auth::user()->id]);
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
        $materia->update(['resto'=>$materia->cantidad]);

        return redirect()->route('materias.index');
    }
    public function destroy(Materia $materia)
    {
        //
    }
    public function detalle()
    {
        $n = 0;
        $consulta=Materia::select('productos.nombre as producto','proveedors.nombre as proveedor',
                DB::raw('COUNT(materias.producto_id) as cargas'),
                DB::raw('SUM(materias.cantidad) as cantidad'),
                DB::raw('SUM(materias.resto) as cantidad_cortada'))
                ->join('productos','productos.id','=','materias.producto_id')
                ->join('proveedors','proveedors.id','=','materias.proveedor_id')
                ->groupBy('producto', 'proveedor')
                ->orderby('materias.proveedor_id')->orderby('proveedors.id', 'desc')->get();
        
        return view('productosproveedor.index',compact('consulta', 'n'));
    }

}
