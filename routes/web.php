<?php

use App\Http\Controllers\controllerAtencion;
use App\Http\Controllers\controllerCargo;
use App\Http\Controllers\controllerCuenta;
use App\Http\Controllers\controllerEspecialista;
use App\Http\Controllers\controllerInicio;
use App\Http\Controllers\controllerLogin;
use App\Http\Controllers\controllerLogout;
use App\Http\Controllers\controllerPaciente;
use App\Http\Controllers\controllerPublicacion;
use App\Http\Controllers\controllerRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
      if(Auth::check()){
        return redirect('/dashboard');
            }
return view('login.principal');
});




Route::GET('/salir', [controllerLogout::class, 'salir']);






  Route::get('/usuario', [controllerEspecialista::class, 'index'])->name('index.usuario');
  Route::post('/usuario',[controllerEspecialista::class, 'store'])->name('crear.perfil');
  Route::get('{id}/usuario/',[controllerEspecialista::class, 'edit'])->name('edit.perfil');
  Route::put('/usuario/{id}',[controllerEspecialista::class, 'update'])->name('editar.perfil');


  

Route::get('/dashboard', [controllerInicio::class, 'show'])->name('index');

    

Route::get('/pacientes',[controllerPaciente::class, 'show'])->name('index.paciente');
Route::delete('/pacientes/{verificador}/',[controllerPaciente::class, 'destroy'])->name('eliminar.paciente');
Route::patch('/pacientes/{id}', [controllerPaciente::class, 'update'])->name('editar.paciente');
Route::post('/crear_paciente',[controllerPaciente::class,'store'])->name('crear_paciente');
Route::get('/crear_paciente',[controllerPaciente::class, 'principalPaciente']);




// RUTAS LOGUEO, REGISTRO
Route::get('/registrar', [controllerRegistrar::class, 'show'])->name('index.registrar');
Route::post('/registrar', [controllerRegistrar::class, 'registrar'])->name('registrar');


Route::post('/login','App\Http\Controllers\controllerLogin@login');
Route::get('/login','App\Http\Controllers\controllerLogin@show');


// RUTAS PUBLICACION

Route::get('/publicaciones',[controllerPublicacion::class, 'show'])->name('index.publicacion');
Route::post('/publicaciones',[controllerPublicacion::class, 'store'])->name('publicar');
Route::delete('/publicaciones/{id}',[controllerPublicacion::class, 'destroy'])->name('eliminar.publicacion');
Route::patch('/publicaciones/{id}',[controllerPublicacion::class, 'update'])->name('editar.publicacion');



//publicacion



route::get('/atencion',[controllerAtencion::class , 'index'])->name('index.atencion');
route::get('/atencion/buscar',[controllerAtencion::class, 'show'])->name('buscar_atencion');
route::post('/atencion',[controllerAtencion::class, 'store'])->name('crear_atencion');
route::post('/atencion/buscar',[controllerAtencion::class, 'horario'])->name('enviar_informacion');



route::get('/gestionar_atencion',[controllerAtencion::class, 'mostrarAtenciones'])->name('gestionar.atencion');

