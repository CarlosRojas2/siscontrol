<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable=[
        'codigo',
        'producto_id',
        'cantidad',
        'precio_compra',
        'importe',
        'estado'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function update_stock($id){
        $producto = Producto::find($id);
        $producto->add_stock();
    }

    // public function categoria(){
    //     return $this->belongsTo(Categoria::class);
    // }

    // public function proveedor(){
    //     return $this->belongsTo(Proveedor::class);
    // }
}
