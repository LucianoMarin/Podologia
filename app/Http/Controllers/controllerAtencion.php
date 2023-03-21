<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Especialista;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class controllerAtencion extends Controller
{

    public function index()
    {
        $validar=0;
        $paciente=$this->cargarPacientes();
        return view('dashboard.atenciones.principal', compact('paciente','validar'));
    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {

        $validar=0;
        $id=Auth::user()->id;
        $atencion=new Atencion();

        $especialista=db::table('especialistas')
        ->where('user',$id)->first();
        
        $atencion->fecha_atencion=$request->fecha_atencion;
        $atencion->hora=$request->hora;
        $atencion->precio_atencion=$request->precio_atencion;
        $atencion->nota=$request->nota;
        $atencion->rut_especialista=$especialista->rut;
        $atencion->rut_paciente=$request->rut;



        $atencion->save();
        return view('dashboard.atenciones.principal', compact('validar'))->with('resultado','Hora ingresada exitosamente!');

       

    }

    public function show(Request $request)
    {
        $validar=0;
        $paciente=$this->cargarPacientes();
        $pacientes=new Paciente();
        $especialista=new Especialista();

        /* 
        $atenciones=db::table('atencions')
         
                    ->join('especialistas','atencions.rut_especialista','especialistas.rut')
                    ->join('pacientes','atencions.rut_paciente','pacientes.rut')
                    ->where('pacientes.rut',$request->rut)
                    ->get();

                    foreach($atenciones as $atencion){

                        if($atencion->rut_paciente){
                            $validar=1;

                        }

                    }

                    */


            $pacientes=db::table('pacientes')
            ->where('rut',$request->rut)->first();

                    
        if($pacientes!=null){
            $validar=1;
            return view('dashboard.atenciones.principal', compact('paciente','pacientes','validar'))->with('resultado','Paciente Encontrado!');

        }
        else{
            return view('dashboard.atenciones.principal', compact('paciente','validar'))->with('error','ERROR: No fue posible encontrar el Paciente');

        }
        
            

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


    public function cargarPacientes(){
        $paciente=new Paciente();
        $paciente=DB::table('pacientes')->get();
        return $paciente;
        

    }
}
