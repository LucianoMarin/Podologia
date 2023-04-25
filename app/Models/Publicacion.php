<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_publicacion';

    protected $fillable = [
    'tipo',
    'titulo',
    'fecha_publicacion',
    'contenido'

    ];

}
