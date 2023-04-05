<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_paciente';
    public $timestamps = false;

    protected $fillable = [
        'rut',
        'primer_nombre',
        'segundo_nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'edad',
        'direccion',
        'telefono'


    ];
}
