<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    public function index()
    {
        $consulta = Insumos::select('nombre', 'total')->get();
        echo json_encode($consulta);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Insumos $insumos)
    {
        //
    }
    public function edit(Insumos $insumos)
    {
        //
    }
    public function update(Request $request, Insumos $insumos)
    {
        //
    }
    public function destroy(Insumos $insumos)
    {
        //
    }
}
