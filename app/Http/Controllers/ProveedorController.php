<?php
namespace App\Http\Controllers;
use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $n=1;
        $proveedors = Proveedor::
        orderBy('id', 'asc')
        ->get();
        return view('proveedors.index', ['proveedors'=>$proveedors])->with('n',$n);
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
        $proveedor->save();
        return redirect()->route('proveedors.index')->with('registrar','ok');
    }
    public function show(proveedor $proveedor)
    {
        return view('proveedors.show',['proveedor'=>$proveedor]);
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
        return redirect()->route('proveedors.index')->with('editar','ok');
    }
    public function destroy(proveedor $proveedor)
    {
        $fk =  $proveedor->fk_proveedorProducto($proveedor->id);
        if($fk == 1)
        {
            return redirect()->route('proveedors.index')->with('eliminar','error');
        }else{
            $proveedor->delete();
            return redirect()->route('proveedors.index')->with('eliminar','ok');
        }
    }
}
