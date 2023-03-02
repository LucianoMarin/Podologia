<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class controllerLogin extends Controller 
{



public function show(){

  if(!Auth::check()){
    return redirect('/');
        }  
else{
  return redirect('dashboard');


}
}



public function login(Request $request){
  $this->validate($request, [

    'usuario'=>'required',
    'contraseña'=>'required',
]);

  $credentials=[
"username"=>$request->usuario,
"password"=>$request->contraseña
];

if(Auth::attempt($credentials)){
  return redirect('dashboard');

}else{
  return redirect('/')->with('resultado', 'Error: Credenciales no validas');

}


  }







  
}
