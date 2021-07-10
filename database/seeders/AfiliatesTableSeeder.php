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
//        Afiliate::truncate();
        $faker = \Faker\Factory::create();

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            Afiliate::create([
                'address' => $faker->address,
                'state' => $faker->randomElement(['Habilitado', 'Deshabilitado', 'En espera']),
            ]);
        }
    }
}
