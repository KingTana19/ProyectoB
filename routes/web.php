<?php

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

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('contactanos/enviar',['as' => 'contactame', 'uses' => 'ContactanosController@create']); */
Route::Post('welcome',['as' => 'contactos.store', 'uses'=> 'ContactanosController@store']);

Auth::routes(['verify' => true]); /* /Activando la verificación de correo/ */

Route::get('/home', ['as'=>'home','uses'=>'HomeController@index']);

Route::get('/productos',['as'=>'productos.index','uses'=>'ProductoController@index']);
Route::post('/productos',['as'=>'productos.store','uses'=>'ProductoController@store']);
/* Route::get('/productos/{id}/editar',['as'=>'productos.edit','uses' =>'ProductoController@edit']); */
Route::put('/productos/{id}',['as'=>'productos.update','uses' =>'ProductoController@update']);
Route::put('/productos/{id}/cantidad',['as'=>'productos.cantidad','uses' =>'ProductoController@cantidad']);
Route::delete('/productos/{id}',['as'=>'productos.delete','uses' =>'ProductoController@destroy']);


/* ------------------------ Categorias -------------------- */
Route::get('/categorias',['as'=>'categorias.index','uses'=>'CategoriasController@index']);
Route::post('/categorias',['as'=>'categorias.store','uses' =>'CategoriasController@store']);
/* Route::get('/categorias/{id}/edit',['as'=>'categorias.edit','uses' =>'CategoriasController@edit']); */
Route::put('/categorias/{id}',['as'=>'categorias.update','uses' =>'CategoriasController@update']);
Route::delete('/categorias/{id}',['as'=>'categorias.delete','uses' =>'CategoriasController@destroy']);


/* ------------------------ Servicios -------------------- */
Route::get('/servicios',['as'=>'servicios.index','uses'=>'ServiciosController@index']);
Route::post('/servicios',['as'=>'servicios.store','uses'=>'ServiciosController@store']);
Route::put('/servicios/{id}',['as'=>'servicios.update','uses'=>'ServiciosController@update']);
Route::delete('/servicios/{id}',['as'=>'servicios.delete','uses'=>'ServiciosController@destroy']);
/* ------------------------                                -------------------- */

/* ------------------------ Usuarios -------------------- */
Route::get('/usuarios',['as'=>'index','uses'=>'UsuarioController@index']);
Route::post('/usuarios',['as'=>'usuarios.store','uses' =>'UsuarioController@store']);
Route::get('/usuarios/{id}/edit',['as'=>'usuarios.edit','uses' =>'UsuarioController@edit']);
Route::put('/usuarios/{id}',['as'=>'usuarios.update','uses' =>'UsuarioController@update']);
Route::delete('/usuarios/{id}',['as'=>'usuarios.delete','uses' =>'UsuarioController@destroy']);


/* VISTAS PRODUCTO Y SERVICIO */
Route::get('/productoss',['as'=>'productoss.show','uses'=>'VistasContoller@producto']);
Route::get('/servicio',['as'=>'servicio.show','uses'=>'VistasContoller@servicio']);
Route::get('/misCitas',['as'=>'servicios.MisCitas','uses' =>'VistasContoller@MisCitas']);


/* ------------------------ Usuarios -------------------- */

Route::get('/cita',['as'=>'cita.index','uses'=>'CitasController@index']);
Route::post('/cita',['as'=>'cita.store','uses' =>'CitasController@store']);
Route::get('/cita/{id}/edit',['as'=>'cita.edit','uses' =>'ContactanosController@edit']);
Route::put('/cita/{id}',['as'=>'cita.update','uses' =>'CitasController@update']);
Route::delete('/cita/{id}',['as'=>'cita.delete','uses' =>'CitasController@des']);
Route::get('/cita/consultar',['as'=>'cita.consultar','uses' =>'CitasController@consultar']);

