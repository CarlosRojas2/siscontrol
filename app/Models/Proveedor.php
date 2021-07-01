<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'proveedors';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'email',
        'numero_ruc',
        'direccion',
        'telefono',
    ];
    public function fk_proveedorMateria($id)
    {
        $productos = DB::table('productos')->where('id', $id)->first();
        if (!empty($productos)) {
            return 1;
        }
    }
}
