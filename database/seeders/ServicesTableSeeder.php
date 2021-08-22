<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Tymon\JWTAuth\Facades\JWTAuth;

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
//        Service::truncate();
        $faker = \Faker\Factory::create();

        $users = \App\Models\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user, 'password' => '123123123']);

            //Generar servicios
            for ($i = 0; $i < 5; $i++) {
                Service::create([
                    'name' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'price' => $faker->randomDigit,
                    'price_fuhped' => $faker->randomDigit,
                ]);
            }
        }
    }
}
