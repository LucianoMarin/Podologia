<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'rut';

    protected $fillable = [
        'rut',
        'primer_nombre',
        'segundo_nombre',
        'apellido_paterno',
        'apellido_materno',
    ];

}
