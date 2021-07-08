<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CorteController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\ProdChorisosController;
use App\Http\Controllers\ProdAhumadosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReportesController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth']);

require __DIR__.'/auth.php';
Route::resource('categorias', CategoriaController ::class)->middleware(['auth']);
Route::get('inicioreporte', [ProductoController::class, 'inicioreporte'])->name('reportespro')->middleware(['auth']);
Route::post('reportepro', [ProductoController::class, 'reportepro'])->name('reporteproducto')->middleware(['auth']);
Route::resource('productos', ProductoController ::class)->middleware(['auth']);
Route::resource('proveedors', ProveedorController ::class)->middleware(['auth']);
Route::resource('materias', MateriaController ::class)->middleware(['auth']);
Route::get('materia/detalle', [MateriaController::class, 'detalle'])->name('materias_det')->middleware(['auth']);
Route::resource('cortes', CorteController ::class)->middleware(['auth']);
Route::get('corte/{id}/crear', [CorteController::class, 'crear'])->name('crear_corte')->middleware(['auth']);
Route::resource('prod_chorisos', ProdChorisosController ::class)->middleware(['auth']);
Route::resource('prod_ahumados', ProdAhumadosController ::class)->middleware(['auth']);
Route::resource('insumos', InsumosController ::class)->middleware(['auth']);

Route::post('reportes/detCortes',[CorteController::Class,'detCortes'])->name('reporte.detCortes')->middleware('auth');
Route::get('reportes/detChorisos',[ProdChorisosController::Class,'chorisos'])->name('reporte.chorisos')->middleware('auth');
Route::post('reportes/prodChorisos',[ProdChorisosController::Class,'prodChorisos'])->name('reporte.prodChorisos')->middleware('auth');


Route::get('reportes/producto_corte',[ReportesController::class,'productos_cortes'])->name('productos_cortes')->middleware('auth');



