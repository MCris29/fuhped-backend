<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
//        User::truncate();
        $faker = \Faker\Factory::create();

        // Crear la misma clave para todos los usuarios
        $password = Hash::make('123123');
        User::create([
            'name' => 'Administrador',
            'last_name' => 'Administrador',
            'phone' => '0987654321',
            'state' => 'Habilitado',
            'email' => 'admin@prueba.com',
            'password' => $password,
        ]);

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'state' => $faker->randomElement(['Habilitado', 'Deshabilitado', 'En espera']),
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
