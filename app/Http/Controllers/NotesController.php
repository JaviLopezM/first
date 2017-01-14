<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Note;
use Illuminate\Support\Facades\Redirect;

class NotesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //carrego a la vriable $notes tot
        // el que hi ha a la base de dades registrada a la classe
        //Note i ho mostro tot amb 'all'
        //$notes = Note::all();

        // Si vull mostrar la surtida paginada
        $notes = Note::paginate(20);

        //dd a laravel equival a vardump
        //mostra el contingut de la variable$notes.


//    retorna la vista notes i a més li passem la variable notes
//    com a 2on paràmetre per a que ho mostre.
        return view('notes/list', compact('notes'));
    }

    public function create()
    {
        return view('notes/create');
    }

    public function store()
    {
        $this->validate(request(), [
//            seleccionamos el campo con el que vamos a trabajar 'notes' i decimos que sea
//        obligatorio 'require' i que tenga un máximo de 200 carácteres.
            'note'=>['required', 'max:200']
        ]);
        $data = request()->all();

        Note::create($data);

        return redirect()->to('notes');

    }

    public function show($note){
    dd($note);

    }

}
