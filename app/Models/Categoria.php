<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'categorias';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable=[
        'nombre',
        'descripcion'
    ];
    
}
