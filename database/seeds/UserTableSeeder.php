<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borro la taula antes de omplir-la per evitar duplicats-
        DB::table('users')->truncate();

        //Li dic que vull crear un usuari en concret.
        factory(App\User::class)->create([
            'nom'=>'Javier',
            'cognoms'=>'Lopez Moreno',
            'DNI'=>'46599098V',
            'email'=>'javierlopez@iesmontsia.org',
            'telefon'=>'618 717 494',
            'adreça'=>'Sant Josep 137 2-1, Sant Carles de la Ràpita',
            'role'=> 'admin',
            'password'=> bcrypt('123456')
        ]);

        //Ara crido la funció factory on hem definit la creació d'usuaris i li diem la cantitat.
        factory(App\User::class, 49)->create();


    }
}
