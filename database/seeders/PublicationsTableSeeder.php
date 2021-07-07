<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Publication::truncate();
        $faker = \Faker\Factory::create();

        //Generar publicaciones
        for ($i = 0; $i < 10; $i++) {
            Publication::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(400, 300, null, false),
            ]);
        }
    }
}
