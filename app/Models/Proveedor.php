<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable=[
        'nombre',
        'email',
        'numero_ruc',
        'direccion',
        'telefono'
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }
    public function materias(){
        return $this->hasMany(Materia::class);
    }
}