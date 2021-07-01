<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prod_productos extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table        = 'prod_productos';
    protected $primaryKey   = 'id';
}
