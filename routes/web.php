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

Route::get('/home', 'HomeController@index')->name('home');
