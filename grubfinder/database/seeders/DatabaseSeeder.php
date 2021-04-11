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
        $this->call([
            UserSeeder::class,
            CountySeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
