<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Cuenta;
use Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TheSeer\Tokenizer\Exception;

class controllerCuenta extends Controller
{

    public function index()
    {
        return view('registrar.principal');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

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
        //
    }






   
}