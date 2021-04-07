<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::insert([
            'name' => Str::random(10),
            'description' => Text::random(25),
        ]);
    }
}
