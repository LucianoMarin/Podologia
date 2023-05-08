<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forma_atencion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo',
        'nombre_tipo',
  

    ];

}
