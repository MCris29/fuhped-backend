<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Afiliate;

class AfiliatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Afiliate::truncate();
        $faker = \Faker\Factory::create();

        // Crear la misma clave para todos los usuarios
        $password = Hash::make('123123');
        Afiliate::create([
            'name' => 'Afiliado',
            'last_name' => 'Afiliado',
            'address' => 'Address',
            'phone' => '0987654321',
            'state' => 'Habilitado',
            'email' => 'afiliate@prueba.com',
            'password' => $password,
        ]);

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            Afiliate::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'address' => $faker->address,
                'state' => $faker->randomElement(['Habilitado', 'Deshabilitado', 'En espera']),
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
