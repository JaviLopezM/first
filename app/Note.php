<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //Creem la següent linia per permetre l'accés a la base de dades (lectura/escritura)
    // i indiquem quina columna volem treballar
    protected $fillable = ['note'];
}
