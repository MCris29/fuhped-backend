<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Service::truncate();
        $faker = \Faker\Factory::create();

        //Generar servicios
        for ($i = 0; $i < 10; $i++) {
            Service::create([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'price' => $faker->randomDigit,
                'price_fuhped' => $faker->randomDigit,
            ]);
        }
    }
}
