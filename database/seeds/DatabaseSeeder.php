<?php

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
        $this->call(RoleSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NarratorSeeder::class);
        $this->call(ReferenceSeeder::class);
        $this->call(HadithProgressStatusSeeder::class);
        $this->call(HadithStatusSeeder::class);
        // $this->call(HadithSeeder::class);
        // $this->call(ReportSeeder::class);
        

    }
}
