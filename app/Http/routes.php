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

Route::get('notes', function () {

    //carrego a la vriable $notes tot
    // el que hi ha a la bae de dades registrada a la classe
    //Note
    $notes = \App\Note::all();

    //dd a laravel equival a vardump
    //mostra el contingut de la variable$notes.


//    retorna la vista notes i a més li passem la variable notes
//    com a 2on paràmetre per a que ho mostre.
    return view('notes', compact('notes'));
});

Route::post('notes', function () {
    return '[Create Notes]';
});

Route::get('notes/create', function () {
    return '[Create Notes]';
});


//      Mostro una cadena per pantalla sense crear un arxiu per mostrar-ho.
Route::get('notes/array', function (){
   return [
    'notes' => 'create array, create muchas cosas, ajoderse'
   ];

});

//      Creo una ruta dinàmica fent servir un paràmetre com a ruta que el paso a la funció
//      El segón paràmetre el fem opcional amb l'interrogant i li possem com a valor per defecte "null"
Route::get('notes/{note}/{slug?}', function ($note, $slug = null){
    dd($note, $slug);

})->where('note', '[0-9]+');
//    on el paràmetre note ha de ser numèric de 0 a 9 i pot tindre diferents dígits com indica el +.