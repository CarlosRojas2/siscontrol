<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

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

    public function fk_categoriaProducto($id)
    {
        $productos = DB::table('productos')->where('categoria_id', $id)->first();
        if (!empty($productos)) {
            return 1;
        }
    }
    
}
