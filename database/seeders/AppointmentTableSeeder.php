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
        for ($i = 0; $i < 20; $i++) {
            Appointment::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'date' => $faker->dateTime,
                'state' => $faker->randomElement(['Realizada', 'En espera']),
                'afiliate_id' => $faker->numberBetween(4, 7),
                'partner_id' => $faker->numberBetween(8, 11),
            ]);
        }
    }
}
