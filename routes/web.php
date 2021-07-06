<?php

use App\Http\Controllers\CargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DesgloseController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CorteController;
use App\Http\Controllers\ProdChorisosController;
use App\Http\Controllers\ProdAhumadosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReportsProdAhumadosController;
use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('inicio'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);

require __DIR__.'/auth.php';
Route::resource('categorias', CategoriaController ::class)->middleware(['auth']);
Route::resource('productos', ProductoController ::class)->middleware(['auth']);
Route::resource('proveedors', ProveedorController ::class)->middleware(['auth']);
Route::resource('materias', MateriaController ::class)->middleware(['auth']);
Route::get('materia/detalle', [MateriaController::class, 'detalle'])->name('materias_det')->middleware(['auth']);
Route::resource('cortes', CorteController ::class)->middleware(['auth']);
Route::get('corte/{id}/crear', [CorteController::class, 'crear'])->name('crear_corte')->middleware(['auth']);
Route::resource('prod_chorisos', ProdChorisosController ::class)->middleware(['auth']);
Route::resource('prod_ahumados', ProdAhumadosController ::class)->middleware(['auth']);

Route::get('reportes_ahumados',[ReportsProdAhumadosController::Class,'ahumados'])->middleware('auth');
Route::post('reportes_ahumados',[ReportsProdAhumadosController::Class,'result_ahumados'])->middleware('auth');

