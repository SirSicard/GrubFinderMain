<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected static $categories = [
        [
            'name' => 'Fast Food/Drive-thrus'
        ],
        [
            'name' => 'Fast Casual'
        ],
        [
            'name' => 'Sports Bar'
        ],
        [
            'name' => 'Casual Dining'
        ],
        [
            'name' => 'Fine Dining'
        ],
        [
            'name' => 'Pop-up Restaurants'
        ],
        [
            'name' => 'Food Trucks'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach(static::$categories as $category){
            if(Category::where('name', $category['name'])->doesntExist()){
                Category::create();
            }
        }

        // Category::insert([
        //     'name' => Str::random(10),
        //     'description' => Text::random(25),
        // ]);
    }
}
