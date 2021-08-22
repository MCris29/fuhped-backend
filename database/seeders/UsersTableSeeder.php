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
        $password = Hash::make('123123123');
        User::create([
            'name' => 'Administrador',
            'last_name' => 'Administrador',
            'phone' => '0987654321',
            'email' => 'admin@prueba.com',
            'password' => $password,
            'role' => 'ROLE_ADMIN',
            'userable_id' => 1,
            'userable_type' => 'App\Models\Admin',
        ]);
        User::create([
            'name' => 'Socio',
            'last_name' => 'Socio',
            'phone' => '0987654321',
            'email' => 'socio@prueba.com',
            'password' => $password,
            'role' => 'ROLE_PARTNER',
            'userable_id' => 1,
            'userable_type' => 'App\Models\Partner',
        ]);
        User::create([
            'name' => 'Afiliado',
            'last_name' => 'Afiliado',
            'phone' => '0987654321',
            'email' => 'afiliado@prueba.com',
            'password' => $password,
            'role' => 'ROLE_AFFILIATE',
            'userable_id' => 1,
            'userable_type' => 'App\Models\Afiliate',
        ]);

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 2; $i < 6; $i++) {
            User::create([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_AFFILIATE',
                'userable_id' => $i,
                'userable_type' => 'App\Models\Afiliate',
            ]);
        }

        for ($i = 2; $i < 6; $i++) {
            User::create([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_PARTNER',
                'userable_id' => $i,
                'userable_type' => 'App\Models\Partner',
            ]);
        }
    }
}
