<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Especialista;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerEspecialista extends Controller
{
   
    public function index()
    {

        
        $validar=false;
        $id=Auth::user()->id;
        $username=Auth::user()->username;
        $cargo=new Cargo();
        $cargo=DB::table('cargos')->get();

        $especialistas=DB::table('especialistas')
        ->join('cargos', 'cargos.id_cargo', '=', 'especialistas.cargo')
        ->where('user',$id)->first();
      if($especialistas!=null){

        $validar=true;
        return view('dashboard.usuario.principal',compact('cargo','validar','especialistas','username'));

      }
      else{
        return view('dashboard.usuario.principal',compact('cargo','validar'));

      }
       

    }


    public function create()
    {
     


    }

  
    public function store(Request $request)
    {

        try{
        $this->validate($request,[
        'rut'=>'required | numeric',
        'primer_nombre'=>'required',
        'segundo_nombre'=>'required',
        'apellido_paterno'=>'required',
        'apellido_materno'=>'required',
        'cargo'=>'required'
          ]);


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
        return redirect()->route('index.usuario')->with('resultado', 'A creado su perfil Exitosamente!');
        }catch(QueryException $ex){

        return redirect()->route('index.usuario')->with('error', 'Error: no se pudo ingresar informacion en la BD');

        }
    }

  
    public function show($id)
    {

    }

    public function edit($id)
    {        
        $cargo=$this->cargarCargos();
        $idCuenta=Auth::user()->id;
        $especialista=Especialista::findOrFail($id);
        return view('dashboard.usuario.editar_perfil',compact('especialista','cargo'));
    }


    public function update(Request $request, $id)
    {        
        $especialista =Especialista::findOrFail($id); //busca por id
        $idCuenta=Auth::user()->id;
        $especialista->rut=$id;
        $especialista->primer_nombre=$request->edprimer_nombre;
        $especialista->segundo_nombre=$request->edsegundo_nombre;
        $especialista->apellido_paterno=$request->edapellido_paterno;
        $especialista->apellido_materno=$request->edapellido_materno;
        $especialista->cargo=$request->edcargo;
        $especialista->user=$idCuenta;
        

        $especialista->save();
        echo $especialista;

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
