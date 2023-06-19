<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerProyecto extends Controller
{

    public function index()
    {

        $proyecto=new Proyecto();
        $proyecto=DB::table('proyectos')->get();

        return view('dashboard.proyecto.principal',compact('proyecto'));


    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
    
        $proyecto=new Proyecto();
        $proyecto->nombre=$request->nombre_proyecto;
        $proyecto->id_proyecto=1;
        $proyecto->save();

        return redirect()->route('index.proyecto');



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
        return redirect()->route('index.proyecto');

    }
}
