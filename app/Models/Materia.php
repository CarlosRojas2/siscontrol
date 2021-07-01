<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Materia extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=[
        'codigo',
        'producto_id',
        'cantidad',
        'resto',
        'precio_compra',
        'importe',
        'proveedor_id',
        'unidadmedida_id'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function unidadmedida(){
        return $this->belongsTo(Unidadmedida::class);
    }

    public function update_stock($id, $cantidad){
        $producto = Producto::find($id);
        $producto->add_stock();
        $producto->add_cantidad($cantidad);
    }

    public function producto_stock($id, $refe_pro){
        $producto_anterior = Producto::find($refe_pro);
        $producto = Producto::find($id);
        if ($id != $refe_pro) {
            $producto_anterior->restar_stock();
            $producto->add_stock();
        }
    }

    public function cantidad_materia()
    {
        
    }
}
