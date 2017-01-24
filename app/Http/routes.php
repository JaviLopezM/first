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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
]);

Route::get('notes', 'NotesController@index');


Route::get('notes/create', 'NotesController@create');
Route::post('notes', 'NotesController@store');


Route::get('notes/{note}', 'NotesController@show')->where('note', '[0-9]+');


//  Exemple de com interpreta Laravel un llistat:
//      Mostro una cadena per pantalla sense crear un arxiu per mostrar-ho.
Route::get('notes/array', function (){
   return [
    'notes' => 'create array, create muchas cosas, ajoderse'
   ];
});
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login'
]);
Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as' => 'login'
]);
Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);

// Registration routes...
Route::get('registro', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'register'
]);
Route::post('registro', [
    'uses' => 'Auth\AuthController@postRegister',
    'as' => 'register'
]);

Route::get('perfil', [
    'uses' => 'PersonalController@index',
    'as'   => 'personal'
]);
    //Reset password

    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


