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
    public function fk_proveedorMateria($id)
    {
        $materias = DB::table('materias')->where('proveedor_id', $id)->first();
        if (!empty($materias)) {
            return 1;
        }
    }
}