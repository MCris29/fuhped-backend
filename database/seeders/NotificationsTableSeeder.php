<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Notification::truncate();
        $faker = \Faker\Factory::create();

        // Generar algunas citas para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            Notification::create([
                'title' => $faker->sentence,
                'receiver_id' => $faker->numberBetween(4, 7),
                'transmitter_id' => $faker->numberBetween(8, 11),
            ]);
        }
    }
}
