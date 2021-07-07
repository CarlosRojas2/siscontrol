<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumos;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(isset(Auth::user()->name)){
            $consulta = Insumos::distinct()->get(['nombre']);
            return redirect()->route('dashboard');
        }
        return redirect()->route('login');
    }
}
