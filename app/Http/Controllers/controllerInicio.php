<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class controllerInicio extends Controller
{

    public function show()
    {    if(!Auth::check()){
        return redirect('/login');
            }  

            date_default_timezone_set("America/Santiago");
            $date = date("Y/m/d");



            $atencionn=DB::table('atencions')
            ->where('fecha_atencion',$date)
            ->where('estado',0)
            ->join('pacientes', 'pacientes.id_paciente', '=', 'atencions.id_pacientes')
            ->orderBy('hora_inicio','asc')
            ->get();

            $id=Auth::user()->id;
            $publicaciones=DB::table('publicacions')->where('user',$id)->get();
            $publicaciones=Publicacion::where('user',$id)
            ->where('tipo','nota')
            ->orderBy('id_publicacion','desc')
            ->paginate(1);

            $atencion=new controllerAtencion();
            $cupos=$atencion->cuposDia();


            
           return view('dashboard.principal',compact('publicaciones','cupos','atencionn'));

    }



}
