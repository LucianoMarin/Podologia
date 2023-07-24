<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Especialista;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class controllerProyecto extends Controller
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

            $proyecto = new Proyecto();
            $proyecto = DB::table('proyectos')->get();

            return view('dashboard.proyecto.principal', compact('proyecto'));
        } catch (ModelNotFoundException $e) {

            return view('dashboard.error.errorAC');
        }
    }

    public function create()
    {
    }


    public function store(Request $request)
    {


        try{
        $this->validate($request,[
        'nombre_proyecto'=>'required',
        ]);


        

        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre_proyecto;
        $proyecto->id_proyecto = 1;

        $proyecto->save();
  



        return redirect()->route('index.proyecto')->with('resultado','Proyecto creado!');

    }catch(Exception $ex){
    
        if($ex->getCode()==23000){

            return redirect()->route('index.proyecto')->with('error','Proyecto no creado');

            

        }
        else{


            return redirect()->route('index.proyecto')->with('error','Proyecto no creado');

        }

    }
    }


    public function show($id)
    {
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

        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();
        return redirect()->route('index.proyecto')->with('resultado','se elimino correctamente!');
    }
}
