<?php

namespace App\Http\Controllers;

use App\Models\Especialista;
use App\Models\Paciente;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerPaciente extends Controller
{
  
    public function index()
    {
    }


    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        try{

        $this->validate($request,[
        'rut'=>'required | numeric | unique:pacientes',
        'verificador'=>'required',
        'primer_nombre'=>'required',
        'apellido_paterno'=>'required',
        'apellido_materno'=>'required',
        'fecha_nacimiento'=>'required',
        'edad'=>'numeric',  
        'telefono'=>'max:11',
        'discapacidad'=>'required',
        ]);

        $paciente=new Paciente();
        $rutCompleto=$request->rut.$request->verificador;
        $paciente->rut=$rutCompleto;
        $paciente->primer_nombre=$request->primer_nombre;
        $paciente->segundo_nombre=$request->segundo_nombre;
        $paciente->apellido_paterno=$request->apellido_paterno;
        $paciente->apellido_materno=$request->apellido_materno;
        $paciente->fecha_nacimiento=$request->fecha_nacimiento;
        $paciente->edad=$request->edad;
        $paciente->direccion=$request->direccion;
        $paciente->telefono=$request->telefono;
        $paciente->discapacidad=$request->discapacidad;

        $paciente->save();

        return redirect()->route('crear_paciente')->with('resultado','Se a agregado exitosamente el paciente');
        
         }catch(QueryException $ex){

        if($ex->errorInfo[1]==1062){
            return redirect()->route('crear_paciente')->with('error', 'ERROR: El rut ingresado ya se encontraba registrado.');


        }else{
        return redirect()->route('crear_paciente')->with('error', 'Error: no se pudo ingresar informacion en la BD'.$ex->getMessage());
        }

    }


    

    }


    public function show()
    {
        try
        {

        if(!Auth::check()){
            return redirect('/login');
                }  

        if(isset(Auth::user()->id)){
            $id=Auth::user()->id;  
            Especialista::where('user',$id)->firstOrFail();
        }
     

        $paciente=new Paciente();
        $paciente=DB::table('pacientes')->get();
   

        return view('dashboard.paciente.principal', compact('paciente'));
    
    }catch(ModelNotFoundException $e){

        return view('dashboard.error.errorAC');
    }
    
    }

    public function principalPaciente()
    {
        if(!Auth::check()){
            return redirect('/login');
                }  

        if(isset(Auth::user()->id)){
            $id=Auth::user()->id;  
            Especialista::where('user',$id)->firstOrFail();
        }
     
        return view('dashboard.paciente.crear_paciente');

    }

 
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $this->validate($request,[
                'rut'=>'required | numeric | unique:pacientes',
                'verificador'=>'required',
                'primer_nombre'=>'required',
                'apellido_paterno'=>'required',
                'apellido_materno'=>'required',
                'fecha_nacimiento'=>'required',
                'edad'=>'numeric',  
                'telefono'=>'max:11',
                'discapacidad'=>'required',
                ]);
              
         
             
        
            $paciente =Paciente::findOrFail($id); 

            $rutCompleto=$request->rut.$request->verificador;
        
            $paciente->rut=$rutCompleto;
            $paciente->primer_nombre=$request->primer_nombre;
            $paciente->segundo_nombre=$request->segundo_nombre;
            $paciente->apellido_paterno=$request->apellido_paterno;
            $paciente->apellido_materno=$request->apellido_materno;
            $paciente->fecha_nacimiento=$request->fecha_nacimiento;
            $paciente->edad=$request->edad;
            $paciente->direccion=$request->direccion;
            $paciente->telefono=$request->telefono;
            $paciente->discapacidad=$request->discapacidad;
    
            $paciente->save();
    
            return redirect()->route('index.paciente')->with('resultado','Se a editado exitosamente el paciente');
            
             }catch(QueryException $ex){
    
            if($ex->errorInfo[1]==1062){
                return redirect()->route('index.paciente')->with('error', 'ERROR: El rut ingresado ya se encontraba registrado.');
    
    
            }else{
            return redirect()->route('index.paciente')->with('error', 'Error: no se pudo ingresar informacion en la BD'.$ex->getMessage());
            }
    
        }
    }


    public function destroy($id)
    {
    $paciente=new Paciente();
    $paciente=Paciente::whereRut($id);
    $paciente->delete();

    return redirect()->route('index.paciente')->with('resultado','Se a eliminado el paciente correctamente!');

    }
}
