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

Route::resource('estudiante', 'EstudianteController');
/*
 Route::get('estudiante', 'EstudianteController@index')->name('estudiante.index');
 Route::get('estudiante/crear', 'EstudianteController@create')->name('estudiante.create'); 
 Route::get('estudiante/{estudiante}/edit', 'EstudianteController@edit');
Route::get('estudiante/{estudiante}', 'EstudianteController@show');

Route::post('estudiante', 'EstudianteController@store')->name('estudiante.store'); 
Route::delete('estudiante/{id}', 'EstudianteController@destroy')->name('estudiante.destroy');*/