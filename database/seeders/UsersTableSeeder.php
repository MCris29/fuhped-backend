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
            'role' => 'ROLE_SUPER_ADMIN',
            'userable_id' => 1,
            'userable_type' => 'App/Model/Admin',
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
                'role' => $faker->randomElement(['ROLE_AFFILIATE', 'ROLE_PARTNER', 'ROLE_ADMIN']),
                'userable_id' => $faker->numberBetween(1, 5),
                'userable_type' => $faker->randomElement(['App/Models/Admin', 'App/Models/Afiliate', 'App/Models/Partner']),
            ]);
        }
    }
}
