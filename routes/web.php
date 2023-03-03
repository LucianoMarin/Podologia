<?php

use App\Http\Controllers\controllerCargo;
use App\Http\Controllers\controllerCuenta;
use App\Http\Controllers\controllerEspecialista;
use App\Http\Controllers\controllerInicio;
use App\Http\Controllers\controllerLogin;
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


/*

Route::get('/registrar_usuario',function(){
return view('dashboard.usuario.nuevo_usuario');
});

*/




  Route::get('/usuario', [controllerEspecialista::class, 'index'])->name('index.usuario');
  Route::post('/usuario',[controllerEspecialista::class, 'store'])->name('crear_perfil');



Route::get('/dashboard', [controllerInicio::class, 'show'])->name('index');

    

Route::get('/pacientes',[controllerPaciente::class, 'show'])->name('index.paciente');



// RUTAS LOGUEO, REGISTRO
Route::get('/registrar', [controllerRegistrar::class, 'show'])->name('index.registrar');
Route::post('/registrar', [controllerRegistrar::class, 'registrar'])->name('registrar');


Route::post('/login','App\Http\Controllers\controllerLogin@login');
Route::get('/login','App\Http\Controllers\controllerLogin@show');


// RUTAS PUBLICACION

Route::get('/publicaciones',[controllerPublicacion::class, 'show'])->name('index.publicacion');
Route::post('/publicaciones',[controllerPublicacion::class, 'store'])->name('publicar');
Route::delete('/publicaciones/{id}',[controllerPublicacion::class, 'destroy'])->name('eliminar.publicacion');
Route::get('/{id}/publicaciones',[controllerPublicacion::class, 'edit'])->name('edit.publicacion');
Route::patch('/publicaciones/{id}',[controllerPublicacion::class, 'update'])->name('editar.publicacion');


