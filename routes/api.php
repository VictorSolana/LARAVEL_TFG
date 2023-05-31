<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//IMPORTAR TABLAS
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\NivelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Usuario
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', 'App\Http\Controllers\UsuarioController@index');
    Route::get('{id}', 'App\Http\Controllers\UsuarioController@show');
    Route::post('', 'App\Http\Controllers\UsuarioController@store');
    Route::put('{id}', 'App\Http\Controllers\UsuarioController@update');
    Route::delete('{id}', 'App\Http\Controllers\UsuarioController@delete');
});
//RUTA
Route::group(['prefix' => 'rutas'], function () {
    Route::get('', 'App\Http\Controllers\RutaController@index');
    Route::get('{id}', 'App\Http\Controllers\RutaController@show');
    Route::post('', 'App\Http\Controllers\RutaController@store');
    Route::post('{id}', 'App\Http\Controllers\RutaController@update');
    Route::get('/FK_IdNivel/{id}','App\Http\Controllers\RutaController@nivel');
    Route::delete('{id}', 'App\Http\Controllers\RutaController@delete');
});

//TIPO
Route::group(['prefix' => 'tipos'], function () {
    Route::get('', 'App\Http\Controllers\TipoController@index');
    Route::get('{id}', 'App\Http\Controllers\TipoController@show');
    Route::post('', 'App\Http\Controllers\TipoController@store');
    Route::put('{id}', 'App\Http\Controllers\TipoController@update');
    Route::delete('{id}', 'App\Http\Controllers\TipoController@delete');
});

//NIVEL
Route::group(['prefix' => 'niveles'], function () {
    Route::get('', 'App\Http\Controllers\NivelController@index');
    Route::get('{id}', 'App\Http\Controllers\NivelController@show');
    Route::post('', 'App\Http\Controllers\NivelController@store');
    Route::put('{id}', 'App\Http\Controllers\NivelController@update');
    Route::delete('{id}', 'App\Http\Controllers\NivelController@delete');
});


//COMENTARIOS
Route::group(['prefix' => 'comentarios'], function () {
    Route::get('', 'App\Http\Controllers\ComentarioController@index');
    Route::get('{id}', 'App\Http\Controllers\ComentarioController@show');
    Route::post('', 'App\Http\Controllers\ComentarioController@store');
    Route::put('{id}', 'App\Http\Controllers\ComentarioController@update');
    Route::delete('{id}', 'App\Http\Controllers\ComentarioController@delete');
});

//ENVIAR CORREO
//Route::get('/contacto', 'ContactoController@showForm')->name('contacto');
Route::post('contacto', 'App\Http\Controllers\CorreoController@store');
