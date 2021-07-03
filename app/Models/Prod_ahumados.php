<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prod_Ahumados extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'prod_ahumados';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable=[
        'prod_producto_id',
        'cecina',
        'lomo',
        'costilla',
        'hueso',
        'hueso_raspado',
        'cabeza',
        'patas',
        'tocino'
    ];

    
}
