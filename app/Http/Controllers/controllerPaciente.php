<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
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
        $this->validate($request,[
        'rut_paciente'=>'required | numeric',
        'verificador'=>'required',
        'primer_nombre'=>'required',
        'segundo_nombre'=>'required',
        'apellido_paterno'=>'required',
        'apellido_materno'=>'required',
        'fecha_nacimiento'=>'required',
        'edad'=>'required | numeric',
        'direccion'=>'required',
        'telefono'=>'required'
        ]);

        $paciente=new Paciente();
        $paciente->rut=$request->rut_paciente;
        $paciente->verificador=$request->verificador;
        $paciente->primer_nombre=$request->primer_nombre;
        $paciente->segundo_nombre=$request->segundo_nombre;
        $paciente->apellido_paterno=$request->apellido_paterno;
        $paciente->apellido_materno=$request->apellido_materno;
        $paciente->fecha_nacimiento=$request->fecha_nacimiento;
        $paciente->edad=$request->edad;
        $paciente->direccion=$request->direccion;
        $paciente->telefono=$request->telefono;

        $paciente->save();

        return redirect()->route('crear_paciente')->with('resultado','Se a agregado exitosamente el paciente');



    

    }


    public function show()
    {
        $paciente=new Paciente();
        $paciente=DB::table('pacientes')->get();



        return view('dashboard.paciente.principal', compact('paciente'));

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
    $paciente=new Paciente();
    $paciente=Paciente::whereid_paciente($id);
    $paciente->delete();

    return redirect()->route('index.paciente')->with('resultado','Se a eliminado el paciente correctamente!');

    }
}
