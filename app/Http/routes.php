<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('notes', 'NotesController@index');


Route::get('create', 'NotesController@create');
Route::post('create', 'NotesController@store');
Route::get('notes/{note}', 'NotesController@show')->where('note', '[0-9]+');


//  Exemple de com interpreta Laravel un llistat:
//      Mostro una cadena per pantalla sense crear un arxiu per mostrar-ho.
Route::get('notes/array', function (){
   return [
    'notes' => 'create array, create muchas cosas, ajoderse'
   ];

});