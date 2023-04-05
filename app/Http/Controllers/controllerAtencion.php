<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Especialista;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class controllerAtencion extends Controller
{

    public function index()
    {
    try{
        if(!Auth::check()){

            return redirect('/login');

                }  

                if(isset(Auth::user()->id)){

                    $id=Auth::user()->id;  

                    Especialista::where('user',$id)->firstOrFail();
                }

        $validar=0;

        $paciente=$this->cargarPacientes();

                 return view('dashboard.atenciones.principal', compact('paciente','validar'));

                 
               }catch(ModelNotFoundException $e){

                return view('dashboard.error.errorAC');
            }
   
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
        ->where('user',$id)->first(); //entre el rut del especialista

  
        $paciente=DB::table('pacientes')->where('rut',$request->rut)
        ->first(); //entrega el id

        
        $atencion->fecha_atencion=$request->fecha_atencion;
        $atencion->hora=$request->hora;
        $atencion->precio_atencion=$request->precio_atencion;
        $atencion->nota=$request->nota;
        $atencion->boleta=$request->boleta;
        $atencion->rut_especialista=$especialista->rut;
        $atencion->id_pacientes=$paciente->id_paciente;



        $atencion->save();
        return view('dashboard.atenciones.principal', compact('validar'))->with('resultado','Hora ingresada exitosamente!');

       

    }


    public function horario(Request $request){
        $horario=array(
        '09:00:00',
        '10:00:00',
        '11:00:00',
        '12:00:00',
        '13:00:00',
        '14:00:00',
        '15:00:00',
        '16:00:00',
        '17:00:00',
        '18:00:00',
        '19:00:00',);




        $atenciones=db::table('atencions')
         
                    ->join('especialistas','atencions.rut_especialista','especialistas.rut')
                    ->join('pacientes','atencions.id_pacientes','pacientes.id_paciente')
                    ->get();

                    foreach($atenciones as $atencion){
      
                        if($atencion->fecha_atencion==$request->fecha_atencion){
                            if (($clave = array_search($atencion->hora, $horario)) !== false) {
                            unset($horario[$clave]);
                            
                        }
                    }
                    }

                     sort($horario);

                        return $horario;

    }





    public function show(Request $request)
    {

        if(!Auth::check()){
            return redirect('/login');
                }  


        $validar=0;
        
        $paciente=$this->cargarPacientes();
        $pacientes=new Paciente();
        $especialista=new Especialista();
       

        
      $horario=$this->horario($request); //aqui
                   


            $pacientes=db::table('pacientes')
            ->where('rut',$request->rut)->first();


            
                    
        if($pacientes!=null){
            $validar=1;
            
            return view('dashboard.atenciones.principal', compact('paciente','pacientes','validar','horario'))->with('resultado','Paciente Encontrado!');

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
