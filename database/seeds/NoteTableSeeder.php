<?php

use Illuminate\Database\Seeder;
use App\Note;


class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Podem crear un bucle que ens mostre 100 notes canviant una variable
//        for($i = 0;$i <=100;$i++){
//            Note::create(['note'=>"Nota $i"]);
//        }

        //Podem utilitzar faker per crear notes aleatories.
        factory(Note::class)->times(100)->create();


    }
}
