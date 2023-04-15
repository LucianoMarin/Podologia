<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'id_atencion';


    protected $fillable = [
        'fecha',
        'hora',
        'precio_atencion',
        'nota',
        'boleta'

    ];

}
