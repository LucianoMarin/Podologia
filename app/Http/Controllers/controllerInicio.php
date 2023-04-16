<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Auth;
use DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class controllerInicio extends Controller
{

    public function show()
    {    if(!Auth::check()){
        return redirect('/login');
            }  
            $id=Auth::user()->id;
            $publicaciones=DB::table('publicacions')->where('user',$id)->get();
            $publicaciones=Publicacion::where('user',$id)
            ->where('tipo','nota')
            ->orderBy('id_publicacion','desc')
            ->paginate(1);

            $atencion=new controllerAtencion();
            $cupos=$atencion->cuposDia();


            
           return view('dashboard.principal',compact('publicaciones','cupos'));

    }



}
