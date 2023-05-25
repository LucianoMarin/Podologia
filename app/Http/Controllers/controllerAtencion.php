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




    public function store(Request $request)
    {
//validar precio y campos nullos
        $validar=0;
        $id=Auth::user()->id;
        $atencion=new Atencion();

        $especialista=db::table('especialistas')
        ->where('user',$id)->first(); //entre el rut del especialista

  
        $paciente=DB::table('pacientes')->where('rut',$request->rut)
        ->first(); //entrega el id

        
        $atencion->fecha_atencion=$request->fecha_atencion;
        $atencion->hora_inicio=$request->hora_inicio;
        $atencion->hora_termino=$request->hora_termino;
        $atencion->precio_atencion=$request->precio_atencion;
        $atencion->nota=$request->nota;
        $atencion->boleta=$request->boleta;
        $atencion->estado=0;
        $atencion->rut_especialista=$especialista->rut;
        $atencion->nombre_proyecto=$request->nombre_proyecto;
        $atencion->id_pacientes=$paciente->id_paciente;
        $atencion->id_atenciones=$request->tipo_atencion;
        
        $atencion->save();
        return view('dashboard.atenciones.principal', compact('validar'))->with('resultado','Hora ingresada exitosamente!');

       

    }



    public function hora_termino(Request $request){
        $horario_termino=array(
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
                $indice=null;
                if($atencion->fecha_atencion==$request->fecha_atencion){
                ($clave = array_search($atencion->hora_inicio, $horario_termino));
                ($clave2 = array_search($atencion->hora_termino, $horario_termino)); 
                ($eReq = array_search($request->hora_inicio, $horario_termino));
  
                            
                        
                            unset($horario_termino[$clave]);
                            unset($horario_termino[$clave2]);


                            $date_inicio = strtotime($atencion->hora_inicio);
                            $date_fin = strtotime($atencion->hora_termino);
                            $date_nueva = strtotime($request->hora_inicio);


              
              

                            $indice=0;
                            $tam=count($horario_termino);

                           
                            $indicee=$clave;

                            while($indicee<$clave2){

                                unset($horario_termino[$indicee]);
                                    $indicee++;
                            }

                            

                            while($indice<$eReq && $indice<$tam){
                                unset($horario_termino[$indice]);
                                $indice++;

                            }
                 
                         
            


                }
            }


   




             sort($horario_termino);




            return $horario_termino;


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

                    $indice=null;
                        
                    
                    foreach($atenciones as $atencion){
                        ($clave = array_search($atencion->hora_inicio, $horario));
                        ($clave2 = array_search($atencion->hora_termino, $horario)); 

                        if($atencion->fecha_atencion==$request->fecha_atencion){

                                    unset($horario[$clave]);
                                    unset($horario[$clave2]);

                                $indice=$clave;

                                    while($indice<$clave2){

                                        unset($horario[$indice]);
                                            $indice++;
                                    }
                                 

                        }
                    }

                     sort($horario);

                        return $horario;

    }





    public function show(Request $request)
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
        $pacientes=new Paciente();
        $especialista=new Especialista();
       

        
      $horario=$this->horario($request); //aqui
      $hora_termino=$this->hora_termino($request);
      $proyecto=$this->nombreProyecto($request);
                   

      $tipo_atencion=$this->tipo_atencion();
    

            $pacientes=db::table('pacientes')
            ->where('rut',$request->rut)->first();


            
                    
        if($pacientes!=null){
            $validar=1;
            
            return view('dashboard.atenciones.principal', compact('proyecto','tipo_atencion','paciente','pacientes','validar','horario','hora_termino'))->with('resultado','Paciente Encontrado!');

        }
        else{
            return view('dashboard.atenciones.principal', compact('paciente','validar'))->with('error','ERROR: No fue posible encontrar el Paciente');

        }
    }catch(ModelNotFoundException $e){

        return view('dashboard.error.errorAC');
    }
            

    }





    public function mostrarAtenciones(){
        try{
    $atencion=db::table('atencions')
    ->join('pacientes','atencions.id_pacientes','pacientes.id_paciente')
    ->orderBy('fecha_atencion','desc')
    ->orderBy('hora_inicio', 'desc')
    ->get();

    $proyecto=db::table('proyectos')
    ->get();

    if(isset(Auth::user()->id)){

        $id=Auth::user()->id;  

        Especialista::where('user',$id)->firstOrFail();
    }


    $tipo_atencion=$this->tipo_atencion();


        return view('dashboard.atenciones.gestionar_atencion', compact('atencion','tipo_atencion','proyecto'));
    }catch(ModelNotFoundException $e){

        return view('dashboard.error.errorAC');
    }


    }


   

    public function destroy($id)
    {
    
     
        $atencion=Atencion::findOrFail($id);
        $atencion->delete();
  
        return redirect()->route('gestionar.atencion')->with('resultado','A eliminado exitosamente la hora!');




    }

   public function cuposDia(){
        
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
    
            $cupos=11;
    
            date_default_timezone_set("America/Santiago");
            $date = date("Y-m-d");
    
            $atenciones=db::table('atencions')
             
                        ->join('especialistas','atencions.rut_especialista','especialistas.rut')
                        ->join('pacientes','atencions.id_pacientes','pacientes.id_paciente')
                        ->get();
    
                        foreach($atenciones as $atencion){
          
                            if($atencion->fecha_atencion==$date){
                             
                                $cupos--;
                                
                            
                        }
                        }
    
    
                            return $cupos;

    }



    public function cargarPacientes(){
        $paciente=new Paciente();
        $paciente=DB::table('pacientes')->get();
        return $paciente;
        

    }

    public function tipo_atencion(){

        $tipo_atencion=db::table('forma_atencion')->get();
        return $tipo_atencion;
    }


    
    public function nombreProyecto(Request $request){

        
        $proyecto=db::table('proyectos')
        ->where('id_proyecto',$request->tipo_atencion)
        ->get();
            

        return $proyecto;
    

    }

}
