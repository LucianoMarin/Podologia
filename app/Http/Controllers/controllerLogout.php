<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class controllerLogout extends Controller
{
    public function salir(){
        Auth::logout();
        return view('login.principal');
        
            
        }
}
