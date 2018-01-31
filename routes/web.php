<?php

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

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@singin');
//Auth::routes();

Route::get('/pacientes', 'PacientesController@index');
Route::get('/pacientes/show/{id}', 'PacientesController@show');
Route::get('/pacientes/edit/{id}', 'PacientesController@edit');
Route::put('/pacientes/update/{id}', 'PacientesController@update');
Route::get('/pacientes/delete/{id}', 'PacientesController@destroy');
Route::get('/pacientes/novo', 'PacientesController@new');
Route::post('/pacientes', 'PacientesController@store');

Route::get('/medicos', 'MedicosController@index');
Route::get('/medicos/show/{id}', 'MedicosController@show');
Route::get('/medicos/edit/{id}', 'MedicosController@edit');
Route::put('/medicos/update/{id}', 'MedicosController@update');
Route::get('/medicos/delete/{id}', 'MedicosController@destroy');
Route::get('/medicos/novo', 'MedicosController@new');
Route::post('/medicos', 'MedicosController@store');

Route::get('/agendas', 'AgendasController@index');
Route::get('/agendas/show/{id}', 'AgendasController@show');
Route::get('/agendas/edit/{id}', 'AgendasController@edit');
Route::put('/agendas/update/{id}', 'AgendasController@update');
Route::get('/agendas/delete/{id}', 'AgendasController@destroy');
Route::get('/agendas/novo', 'AgendasController@new');
Route::post('/agendas', 'AgendasController@store');

Route::get('/home', 'HomeController@index')->name('home');
