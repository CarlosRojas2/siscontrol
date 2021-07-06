<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumos_tipo extends Model
{
    use HasFactory;
    protected $table        = 'insumos_tipos';
    protected $primaryKey   = 'id';
}
