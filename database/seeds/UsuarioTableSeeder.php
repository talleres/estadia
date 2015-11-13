<?php

use Illuminate\Database\Seeder;
use App\User;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsuarioTableSeeder extends Seeder
{
    public function run()
    {
        User::create(array(
        	'nombre'=> 'Administrador',
            'usuario'  => 'admin',
            'email'     => 'admin@laravel.com',
            'password' => Hash::make('admin') 
        ));
        User::create(array(
            'nombre'=> 'Santiago Gomez',
            'usuario'  => 'root',
            'email'     => 'tuto@laravel.com',
            'password' => Hash::make('toor') 
        ));
    }
}
