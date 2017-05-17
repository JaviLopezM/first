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
//Route::get('/home', [
//        'uses' => 'HomeController@index',
//        'as'   => 'home'
//]);

Route::get('notes', 'NotesController@index')->middleware('auth');


Route::get('notes/create', 'NotesController@create')->middleware('auth');
Route::post('notes', 'NotesController@store');


Route::get('notes/{note}', 'NotesController@show')->where('note', '[0-9]+');


Route::resource('auth' , 'Auth\AuthController');
Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);
Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as' => 'login'
]);
//Route::delete('destroy', [
//    'uses' => 'Auth\AuthController@destroy',
//    'as' => 'eliminar'
//]);
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login'
]);
//ruta per llistar usuaris

Route::get('list', 'PersonalController@getUsers')->middleware('auth');

//Route::get('perfil',function(){
//  $users = User::all();
//  return view('auth.perfil',['users'=>$users]);
//});
//ruta per eliminar usuaris
//Route::delete('user/{id}', function ($id) {
//    $user = App\User::find($id)->delete();
//    return Redirect::back();
//});
Route::post('/eliminar/{$user_id}', [
    'as' => 'eliminar',
    'uses' => 'PersonalController@destroyUser'
]);

Route::get('perfil', 'PersonalController@getPerfil')->name('perfil')->middleware('auth');
Route::post('actualizar', 'PersonalController@postActualizar')->name('Actualizar')->middleware('auth');
Route::get('/images/{filename}', 'UserController@getImage')->name('Imagen');

    //Preparo les rutes per a fer una recuperació de contrasenya si tinc temps.

    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


