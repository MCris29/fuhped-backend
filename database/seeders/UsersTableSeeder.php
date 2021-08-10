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
            'role' => 'ROLE_ADMIN',
            'userable_id' => 1,
            'userable_type' => 'App\Models\Admin',
        ]);

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'state' => $faker->randomElement(['Habilitado', 'Deshabilitado', 'En espera']),
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_AFFILIATE',
                'userable_id' => $faker->numberBetween(1, 5),
                'userable_type' => 'App\Models\Afiliate',
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'state' => $faker->randomElement(['Habilitado', 'Deshabilitado', 'En espera']),
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_PARTNER',
                'userable_id' => $faker->numberBetween(1, 5),
                'userable_type' => 'App\Models\Partner',
            ]);
        }
    }
}
