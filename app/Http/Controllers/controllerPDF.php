<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class controllerPDF extends Controller
{


function imprimirInforme($rut){
$today = Carbon::now()->format('d/m/Y ');

$paciente=DB::table('pacientes')
->where('rut',$rut)
->first();

//CONSULTA REALIZADAS
$realizadas=DB::table('atencions')
->where('id_pacientes',$paciente->id_paciente)
->where('estado',1)
->orderBy('fecha_atencion','ASC')
->orderBy('boleta','DESC')
->get();

//CONSULTAS NO REALIZADAS
$noRealizadas=DB::table('atencions')
->where('id_pacientes',$paciente->id_paciente)
->where('estado',2)
->get();

//CONSULTAS REALIZADAS PROYECTO
$proyecto=DB::table('atencions')
->where('id_pacientes',$paciente->id_paciente)
->join('forma_atencion','id_atenciones','id_tipo')
->join('proyectos','nombre_proyecto','id')
->where('estado',1)
->where('id_atenciones',1)
->orderBy('id','ASC')
->get();


$domicilio=DB::table('atencions')
->where('id_pacientes',$paciente->id_paciente)
->join('forma_atencion','id_atenciones','id_tipo')
->where('estado',1)
->where('id_atenciones',2)
->get();


$particular=DB::table('atencions')
->where('id_pacientes',$paciente->id_paciente)
->join('forma_atencion','id_atenciones','id_tipo')
->where('estado',1)
->where('id_atenciones',3)
->get();






$nombreCompleto=$paciente->primer_nombre.' '.$paciente->segundo_nombre.' '. $paciente->apellido_paterno.' '.$paciente->apellido_materno;
if($paciente->discapacidad==0){
$discapacidad="SI";

}
else if($paciente->discapacidad==1){

    $discapacidad="NO";
}
else{
$discapacidad="NO INFORMADA";

}

$pdf=Pdf::loadView('plantillas.informePaciente', compact('particular','domicilio','proyecto','rut','nombreCompleto','discapacidad','realizadas','noRealizadas'));
return $pdf->download($nombreCompleto.' '.$today.'- INFORME.pdf');
}



}


