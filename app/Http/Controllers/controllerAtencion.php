<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Especialista;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class controllerAtencion extends Controller
{

    public function index()
    {
        try {
            if (!Auth::check()) {

                return redirect('/login');
            }

            if (isset(Auth::user()->id)) {

                $id = Auth::user()->id;

                Especialista::where('user', $id)->firstOrFail();
            }

            $validar = 0;

            $paciente = $this->cargarPacientes();

            return view('dashboard.atenciones.principal', compact('paciente', 'validar'));
        } catch (ModelNotFoundException $e) {

            return view('dashboard.error.errorAC');
        }
    }




    public function store(Request $request)
    {


        try {


            $this->validate($request, [
                'fecha_atencion' => 'required',
                'hora_inicio' => 'required',
                'hora_termino' => 'required',
                'precio_atencion' => 'numeric | nullable',
                'boleta' => 'required',
                'tipo_atencion' => 'required',
            ]);

            $validar = 0;
            $id = Auth::user()->id;
            $atencion = new Atencion();

            $especialista = db::table('especialistas')
                ->where('user', $id)->first(); //entre el rut del especialista


            $paciente = DB::table('pacientes')->where('rut', $request->rut)
                ->first(); //entrega el id

            $carbon = new \Carbon\Carbon();
            $date = Carbon::now();
            echo $date;

            $atencion->fecha_atencion = $request->fecha_atencion;
            $atencion->hora_inicio = $request->hora_inicio;
            $atencion->hora_termino = $request->hora_termino;
            if (empty($request->precio_atencion)) {
                $atencion->precio_atencion = 0;
            } else {
                $atencion->precio_atencion = $request->precio_atencion;
            }
            $atencion->nota = $request->nota;
            $atencion->boleta = $request->boleta;
            $atencion->estado = 0;
            $atencion->rut_especialista = $especialista->rut;
            $atencion->nombre_proyecto = $request->nombre_proyecto;
            $atencion->id_pacientes = $paciente->id_paciente;
            $atencion->id_atenciones = $request->tipo_atencion;

            $atencion->save();
            return redirect()->route('index.atencion')->with('resultado', 'Hora ingresada exitosamente!');
        } catch (QueryException $ex) {
            $validar = 0;
            return redirect()->route('index.atencion')->with('error', 'ERROR: no se pudo ingresar la atencion.');
        }
    }





    public function show(Request $request)
    {

        try {
            if (!Auth::check()) {
                return redirect('/login');
            }




            if (isset(Auth::user()->id)) {

                $id = Auth::user()->id;

                Especialista::where('user', $id)->firstOrFail();
            }

            $validar = 0;

            $paciente = $this->cargarPacientes();
            $pacientes = new Paciente();
            $especialista = new Especialista();



            $horario = $this->horario($request); //aqui
            $hora_termino = $this->hora_termino($request);
            $proyecto = $this->nombreProyecto($request);


            $tipo_atencion = $this->tipo_atencion();


            $pacientes = db::table('pacientes')
                ->where('rut', $request->rut)->first();




            if ($pacientes != null) {
                $validar = 1;

                return view('dashboard.atenciones.principal', compact('proyecto', 'tipo_atencion', 'paciente', 'pacientes', 'validar', 'horario', 'hora_termino'))->with('resultado', 'Paciente Encontrado!');
            } else {
                return redirect()->route('index.atencion')->with('error', 'ERROR: No se pudo encontrar el paciente.');
            }
        } catch (ModelNotFoundException $e) {

            return view('dashboard.error.errorAC');
        }
    }




    public function modificarhora(Request $request, $id){

        try{

        $atencion=Atencion::findOrfail($id);

        $atencion->fecha_atencion=$request->fecha_atencion;
        $atencion->hora_inicio=$request->hora_inicio;
        $atencion->hora_termino=$request->hora_termino;

        $atencion->save();

        return redirect()->route('gestionar.atencion')->with('resultado','Modifico el horario de atencion!');

        }catch(Exception $ex){



        }

    }




    public function modificartipo(Request $request, $id){

        $atencion=Atencion::findOrfail($id);

        $atencion->id_atenciones=$request->tipo_atencion;
        if($request->tipo_atencion==1){
        $atencion->nombre_proyecto=$request->nombre_proyecto;
        }else{
            $atencion->nombre_proyecto=null;

        }

        $atencion->save();


        return redirect()->route('gestionar.atencion')->with('resultado','Modifico el Tipo de atencion!');


    }





    public function destroy($id)
    {


        $atencion = Atencion::findOrFail($id);
        $atencion->delete();

        return redirect()->route('gestionar.atencion')->with('resultado', 'A eliminado exitosamente la hora!');
    }





    public function hora_termino(Request $request)
    {


        $atenciones = db::table('atencions')

            ->join('especialistas', 'atencions.rut_especialista', 'especialistas.rut')
            ->join('pacientes', 'atencions.id_pacientes', 'pacientes.id_paciente')
            ->get();

        $cont = 0;
        $cont2 = 0;
        $bandera = false;


        foreach ($atenciones as $atencion) {
            if ($atencion->fecha_atencion == $request->fecha_atencion) {
                $bandera = true;
            }
        }



        try {
            $horario_termino = $this->horario($request); //aqui

            $tam = count($horario_termino);



            while ($cont < $tam) {

                if ($horario_termino[$cont] < $request->hora_inicio) {
                    unset($horario_termino[$cont]);
                }

                $cont = $cont + 1;
            }


            sort($horario_termino);


            $mifecha = new \DateTime($request->hora_inicio);


            while ($cont2 < $tam) {



                if ($bandera == true && $mifecha->format('H:00:00') < $horario_termino[$cont2]) {

                    unset($horario_termino[$cont2]);
                }


                $cont2 = $cont2 + 1;
                $mifecha->modify('+1 hours');
            }
        } catch (\Exception $ex) {
            sort($horario_termino);
        }


        return $horario_termino;
    }


    public function horario(Request $request)
    {
        $horario = array(
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
            '19:00:00',
        );
        $horario_vacio = array();





        $atenciones = db::table('atencions')

            ->join('especialistas', 'atencions.rut_especialista', 'especialistas.rut')
            ->join('pacientes', 'atencions.id_pacientes', 'pacientes.id_paciente')
            ->get();

        $indice = null;


        foreach ($atenciones as $atencion) {


            ($clave = array_search($atencion->hora_inicio, $horario));
            ($clave2 = array_search($atencion->hora_termino, $horario));

            if ($atencion->fecha_atencion == $request->fecha_atencion) {

                unset($horario[$clave]);
                unset($horario[$clave2]);


                $indice = $clave;

                while ($indice < $clave2) {

                    unset($horario[$indice]);
                    $indice++;
                }
            }
        }

        sort($horario);

        if ($request->fecha_atencion != null) {
            return $horario;
        } else {
            return $horario_vacio;
        }
    }





    public function mostrarAtenciones()
    {
        try {
            $atencion = db::table('atencions')
                ->join('pacientes', 'atencions.id_pacientes', 'pacientes.id_paciente')
                ->join('forma_atencion', 'atencions.id_atenciones', 'forma_atencion.id_tipo')
                ->orderBy('fecha_atencion', 'desc')
                ->orderBy('hora_inicio', 'desc')
                ->get();

            $proyecto = db::table('proyectos')
                ->get();

            if (isset(Auth::user()->id)) {

                $id = Auth::user()->id;

                Especialista::where('user', $id)->firstOrFail();
            }


            $tipo_atencion = $this->tipo_atencion();


            return view('dashboard.atenciones.gestionar_atencion', compact('atencion', 'tipo_atencion', 'proyecto'));
        } catch (ModelNotFoundException $e) {

            return view('dashboard.error.errorAC');
        }
    }


    public function cuposDia()
    {


        $cupos = 0;
        $cont = 0;



        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d");


        $horario = array(
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
            '19:00:00',
        );

        $atenciones = db::table('atencions')
            ->join('especialistas', 'atencions.rut_especialista', 'especialistas.rut')
            ->join('pacientes', 'atencions.id_pacientes', 'pacientes.id_paciente')
            ->get();




        /*

        foreach ($atenciones as $atencion) {
           
            
            if ($atencion->fecha_atencion == $date) {
           
                while($atencion->hora_inicio==$atencion->hora_termino){

                    echo $cupos++;
         
                }
         
             


            }
        }
*/






        return $cupos;
    }



    public function cargarPacientes()
    {
        $paciente = new Paciente();
        $paciente = DB::table('pacientes')->get();
        return $paciente;
    }

    public function tipo_atencion()
    {

        $tipo_atencion = db::table('forma_atencion')->get();
        return $tipo_atencion;
    }



    public function nombreProyecto(Request $request)
    {


        $proyecto = db::table('proyectos')
            ->where('id_proyecto', $request->tipo_atencion)
            ->get();


        return $proyecto;
    }



    public function confirmarAtencion($id)
    {
        $atencion = Atencion::findOrFail($id);

        $atencion->estado = 1;

        $atencion->save();

        return redirect()->route('index');
    }



    public function rechazarAtencion($id)
    {
        $atencion = Atencion::findOrFail($id);
        $atencion->delete();

        return redirect()->route('index');
    }
}
