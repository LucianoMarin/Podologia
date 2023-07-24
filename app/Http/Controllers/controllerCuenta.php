<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Cuenta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TheSeer\Tokenizer\Exception;

class controllerCuenta extends Controller
{

    public function index()
    {
        return view('registrar.principal');
    }



    public function update(Request $request, $id)
    {

    
        if(!Auth::check()){
            return redirect('/');
                }  


        $this->validate($request,[
            'contraseña'=>'required | same:contraseña2',
            'contraseña2'=>'required'

        ]);

        
        $nombre=$request->usuario;

        $usuario =User::findOrFail($id); 
        $usuario->password=$request->contraseña;
        $usuario->save();

        

        return redirect()->route('clave_principal')->with('resultado', 'Usuario: '.$nombre." a cambiado su contraseña!");

    }


    public function change_pass(){

        if(!Auth::check()){
            return redirect('/');
                }  


        $usuario=Auth::user()->username;
        $id=Auth::user()->id;
        return view('dashboard.usuario.edit_password' , compact('usuario','id'));


    }






   
}