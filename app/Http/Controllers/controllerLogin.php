<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Cuenta;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

  try{
  $this->validate($request, [

    'usuario'=>'required',
    'contraseña'=>'required',
]);


$intento = DB::table('users')->where('username',$request->usuario)->value('intento');



  $credentials=[
"username"=>$request->usuario,
"password"=>$request->contraseña
];



if($intento<3){
if(Auth::attempt($credentials)){
  
  User::where('username',$request->usuario)->update(array(
    'intento'=>0,));
  return redirect('dashboard');
  
}else{

  User::where('username',$request->usuario)->update(array(
    'intento'=>$intento+1,
));
  return redirect('/')->with('error', 'Error: Credenciales no validas');
}
}


if($intento==3){

  return redirect('/')->with('error', 'Error: USUARIO BLOQUEADO, comuniquese con su administrador');

}



}catch(QueryException $ex){

  if($ex->getCode()==2002){
    return redirect('/')->with('error','Error: Hay un problema de conexion (BD)');
  }
  else{
    return redirect('/')->with('error','Error: ocurrio un error interno');


  }
  }
  }







  
}
