<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Proveedor extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'proveedors';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable=[
        'nombre',
        'email',
        'numero_ruc',
        'direccion',
        'telefono'
    ];
    public function fk_proveedorProducto($id)
    {
        $productos = DB::table('productos')->where('proveedor_id', $id)->first();
        if (!empty($productos)) {
            return 1;
        }
    }
}