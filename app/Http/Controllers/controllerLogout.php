<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class controllerLogout extends Controller
{
    public function salir(){
        Auth::logout();
        return view('login.principal');
        
            
        }
}
