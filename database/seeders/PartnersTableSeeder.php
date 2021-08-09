<?php

namespace Database\Seeders;

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
//        Partner::truncate();
        $faker = \Faker\Factory::create();

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            Partner::create([
                'address' => $faker->address,
                'business' => $faker->company,
                'description' => $faker->sentence,
            ]);
        }
    }
}
