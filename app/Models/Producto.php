<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=[
        'codigo',
        'nombre',
        'stock',
        'estado',
        'categoria_id'
    ];

    public function add_stock(){
        $this->increment('stock', 1);

    }

    public function restar_stock(){
        $this->decrement('stock', 1);
    }

    public function add_cantidad($cantidad){
        $this->increment('cantidad_inicial', $cantidad);
    }

    public function relacionMateria($id)
    {
        $materias = DB::table('materias')->where('producto_id', $id)->first();
        if (!empty($materias)) {
            return 1;
        }
        // print_r($materias);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function materias(){
        return $this->hasMany(Materia::class);
    }
}
