<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cuenta extends Authenticatable
{
    use HasFactory;


    public $timestamps = false;


    Protected $fillable=[
    'username',
    'password',
    'intento'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
        }
        
  

}
