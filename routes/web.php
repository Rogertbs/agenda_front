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
Route::delete('/pacientes/delete/{id}', 'PacientesController@delete');
Route::get('/pacientes/novo', 'PacientesController@new');
Route::post('/pacientes', 'PacientesController@store');

Route::get('/medicos', 'MedicosController@index');
Route::get('/medicos/show/{id}', 'MedicosController@show');
Route::get('/medicos/edit/{id}', 'MedicosController@edit');
Route::put('/medicos/update/{id}', 'MedicosController@update');

Route::get('/home', 'HomeController@index')->name('home');
