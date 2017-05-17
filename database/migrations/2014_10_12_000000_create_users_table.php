<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('DNI')->unique();
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('password', 60);
            $table->string('foto')->default('default.jpg');
            $table->enum('role',['user', 'editor', 'admin'])->default('user');//camp personalitzat entre estos 3.
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
