<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
//        Admin::truncate();
        $faker = \Faker\Factory::create();

        // Generar algunos administradores para nuestra aplicación
        for ($i = 0; $i < 4; $i++) {
            Admin::create([]);
        }
    }
}
