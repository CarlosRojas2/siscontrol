<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $fillable=[
        'codigo',
        'nombre',
        'stock',
        'estado',
        'categoria_id',
        'proveedor_id'
    ];

    public function add_stock(){
        $this->increment('stock', 1);
    }

    public function restar_stock(){
        $this->decrement('stock', 1);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function materias(){
        return $this->hasMany(Materia::class);
    }
}
