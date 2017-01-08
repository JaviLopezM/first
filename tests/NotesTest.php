<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

//Importem el "NameSpace"App per a que ens trobe la classe.
use App\Note;
class NotesTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * test personaltzat,
     * per comprovar el funcionament
     */

    //    nom de la funció que farà la prova
    public function test_noteslist()
    {
    //Having
    //Condició de la prova
    // (En aquest cas hi ha 2 notes a la base de dades).

        // afegim 2 notes a la taula "note"
//        Note::create(['note' =>'My first note']);
//        Note::create(['note' =>'second note']);

    //When
    //Accions que faría l'usuari

        //Comprovem que la pàgina notes existeix al accedir.
        $this->visit('notes')

    //Then
    //Comprovacions

         // dins de la pàgina notes podem veure el missatge:
            ->see('My first note')
         // i també podem veure el següent missatge:
            ->see('second note');

    }
    public function test_create_note()
    {
//        when
        $this->visit('notes')
            ->click('Add a note')
//            then
            ->seePageIs('notes/create')
            ->see('Create a note')
            ->type('A new note', 'note')
            ->press('Create note')
            ->seePageIs('notes')
            ->see('A new note')
            ->seeInDatabase('notes', [
                'note' => 'A new note'
            ]);
    }
}
