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
        //Note
        $notes = Note::all();

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
        $data = request()->all();

        Note::create($data);

        return redirect()->to('notes');

    }

    public function show($note){
    dd($note);

    }

}
