<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Especialista;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerEspecialista extends Controller
{
   
    public function index()
    {

        
        $validar=false;
        $id=Auth::user()->id;
        $cargo=new Cargo();
        $cargo=DB::table('cargos')->get();
        $especialistas=DB::table('especialistas')->where('user',$id)->first();
      if($especialistas!=null){
        $validar=true;
        return view('dashboard.usuario.principal',compact('cargo','validar','especialistas'));

      }
      else{
        return view('dashboard.usuario.principal',compact('cargo','validar'));

      }
       

    }

/*
    public function indexNuevoUsuario($validar){
        $cargo=new Cargo();
        $cargo=DB::table('cargos')->get();
        return view('dashboard.usuario.principal',compact('cargo','validar'));

    }
    */


    public function create()
    {
     


    }

  
    public function store(Request $request)
    {
        $especialista=new Especialista();
        $idCuenta=Auth::user()->id;
        $especialista->rut=$request->rut;
        $especialista->primer_nombre=$request->primer_nombre;
        $especialista->segundo_nombre=$request->segundo_nombre;
        $especialista->apellido_paterno=$request->apellido_paterno;
        $especialista->apellido_materno=$request->apellido_materno;
        $especialista->cargo=$request->cargo;
        $especialista->user=$idCuenta;
        

        $especialista->save();
        return redirect()->route('index.usuario');

    }

  
    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }


    public function cargarCargos(){

        $cargo=new Cargo();
        $cargo=DB::table('cargos')->get();

        return $cargo;

    }
}
