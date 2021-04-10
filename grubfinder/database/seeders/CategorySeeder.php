<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected static $categories = [
        [
            'name' => 'Fast Food/Drive-thrus',
            'description' => '',
            'slug' => 'fast-food-drive-thrus',
        ],
        [
            'name' => 'Fast Casual',
            'description' => '',
            'slug' => 'fast-casual',
        ],
        [
            'name' => 'Sports Bar',
            'description' => '',
            'slug' => 'sports-bar',
        ],
        [
            'name' => 'Casual Dining',
            'description' => '',
            'slug' => 'casual-dining',
        ],
        [
            'name' => 'Fine Dining',
            'description' => '',
            'slug' => 'fine-dining',
        ],
        [
            'name' => 'Pop-up Restaurants',
            'description' => '',
            'slug' => 'pop-up-restaurants',
        ],
        [
            'name' => 'Food Trucks',
            'description' => '',
            'slug' => 'food-trucks',
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
                Category::create([
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'slug' => $category['slug'],
                ]);
            }
        }

        // Category::insert([
        //     'name' => Str::random(10),
        //     'description' => Text::random(25),
        // ]);
    }
}
