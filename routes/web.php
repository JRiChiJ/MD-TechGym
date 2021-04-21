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
    return view('index');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Rutas Discplina
Route::get('/disciplina','DisciplinaController@index');
Route::post('/disciplina/registrar', 'DisciplinaController@store');
//Rutas Cliente
Route::get('/cliente','ClienteController@index');
Route::post('/cliente/registrar', 'ClienteController@store');
Route::put('/cliente/modificar','ClienteController@update');
Route::put('/cliente/eliminar','ClienteController@delete');
Route::get('/cliente/selectCliente','ClienteController@selectCliente');