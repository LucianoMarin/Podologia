<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Auth;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class controllerPublicacion extends Controller
{


  


    public function store(Request $request)
    {
        try{

        $this->validate($request, [
            'tipo'=>'required',
            'titulo'=>'required',
            'publicacion'=>'required'
        ]);

       


        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d");
        $id=Auth::user()->id;
  
        $publicacion=new Publicacion();
        $publicacion->tipo=$request->tipo;
        $publicacion->titulo=$request->titulo;
        $publicacion->fecha_publicacion=$date;
        $publicacion->contenido=$request->publicacion;
        $publicacion->user=$id;
        if($request->titulo!='' && $request->publicacion!='' && $request->tipo!='' ){
            $publicacion->save();
            return redirect()->route('index.publicacion');
        }
        return redirect()->route('index');

    }catch(QueryException $ex){
        return redirect()->route('index')->with('resultado', 'ERROR: No se ingreso la publicación');



    }
    }




    public function show()
    {    if(!Auth::check()){
        return redirect('/login');
            }  
            $id=Auth::user()->id;
            $publicaciones=DB::table('publicacions')->where('user',$id)->get();
           return view('dashboard.publicacion.principal',compact('publicaciones'));

    }




    public function update(Request $request, $id)
    {

        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d");
        $idCuenta=Auth::user()->id;

        $publicacion =Publicacion::findOrFail($id); //busca por id

        $publicacion->tipo=$request->tipo;
        $publicacion->titulo=$request->titulo;
        $publicacion->fecha_publicacion=$date;
        $publicacion->contenido=$request->publicacion;
        $publicacion->user=$idCuenta;

        $publicacion->save();
        return redirect()->route('index.publicacion');


    }

 
    public function destroy($id)
    {

        $publicacion=Publicacion::whereid_publicacion($id);
        $publicacion->delete();


        return redirect()->route('index.publicacion');
        
    }
}
