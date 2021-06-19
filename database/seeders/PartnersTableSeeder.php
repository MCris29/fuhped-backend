<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Partner::truncate();
        $faker = \Faker\Factory::create();

        // Crear la misma clave para todos los usuarios
        $password = Hash::make('123123');
        Partner::create([
            'name' => 'Socio',
            'last_name' => '1',
            'address' => 'Address',
            'business' => 'Odontología',
            'description' => 'Una pequeña description',
            'phone' => '0987654321',
            'state' => 'Habilitado',
            'email' => 'partner@prueba.com',
            'password' => $password,
        ]);

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            Partner::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'address' => $faker->address,
                'business' => $faker->company,
                'description' => $faker->paragraph,
                'state' => $faker->randomElement(['Habilitado', 'Deshabilitado', 'En espera']),
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
