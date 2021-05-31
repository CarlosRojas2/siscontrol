<?php
namespace App\Http\Controllers;
use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProveedorController extends Controller
{
    public function index()
    {
        $n=1;
        $proveedors = Proveedor::
        where('estado','=','1')
        ->orderBy('id', 'asc')
        ->get();
        $cont= count($proveedors);
        return view('proveedors.index', ['proveedors'=>$proveedors])->with('n',$n)->with('cont',$cont);
    }
    public function create()
    {
        return view('proveedors.create');
    }
    public function store(StoreRequest $request)
    {
        $proveedor = new Proveedor;
        $proveedor->nombre = $request->nombre;
        $proveedor->email = $request->email;
        $proveedor->numero_ruc = $request->numero_ruc;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->estado = '1';
        $proveedor->save();
        flash::success('El proveedor fue registrado con éxito');
        return redirect ('/proveedors');
    }
    public function show(proveedor $proveedor)
    {
        
    }
    public function edit(Proveedor $proveedor)
    {   
        
        return view('proveedors.edit',['proveedor'=>$proveedor]);
    }
    public function update(UpdateRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->email = $request->email;
        $proveedor->numero_ruc = $request->numero_ruc;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->update();
        flash::warning('El proveedor fue actualizado con éxito');
        return redirect ('/proveedors');
    }
    public function destroy(proveedor $proveedor)
    {
        $proveedor->estado = '0';
        $proveedor->update();
        flash::error('El proveedor fue eliminado con éxito');
        return redirect('/proveedors');
    }
}
