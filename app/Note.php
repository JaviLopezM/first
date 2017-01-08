<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //Creem la següent linia per permetre l'accés a la base de dades desde aquesta classe mitjançant arrays.
    protected $fillable = ['note'];
}
