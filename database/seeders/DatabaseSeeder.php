<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AfiliatesTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(PublicationsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);
    }
}
