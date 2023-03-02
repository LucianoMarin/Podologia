<?php

namespace App\Http\Controllers;


use Auth;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
class controllerRegistrar extends Controller
{



    public function show()
    {
        return view('registrar.principal');
    }


    public function registrar(Request $request){

        $this->validate($request, [

                'correo'=>'required',
                'username'=>'required | unique:users',
                'contraseña'=>'required | same:validar_contraseña',
                'validar_contraseña'=>'required'
            ]);
        
            $cuenta = new User();
            $cuenta->email=$request->correo;
            $cuenta->username = $request->username;
            $cuenta->password = Hash::make($request->contraseña); //ENCRIPTA 
          
            return redirect('registrar')->with('resultado', 'Registro exitoso!');
            

        

                    
            

    }




}
