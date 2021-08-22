<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

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

        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear artículos en su nombre
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => 'admin@prueba.com', 'password' => '123123123']);

            // Y ahora con este usuario creamos algunas publicaciones
            for ($i = 0; $i < 2; $i++) {
                Publication::create([
                    'title' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'image' => $faker->imageUrl(400, 300, null, true),
                ]);
            }
        }
    }
}
