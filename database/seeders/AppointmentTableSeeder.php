<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Appointment::truncate();
        $faker = \Faker\Factory::create();

        // Generar algunas citas para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            Appointment::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'date' => $faker->dateTime,
                'state' => $faker->randomElement(['Realizada', 'En espera']),
                'afiliate_id' => $faker->numberBetween(1, 10),
                'partner_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
