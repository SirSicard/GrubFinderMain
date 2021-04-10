<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    protected static $counties = [
        [
            'name' => 'Norrbotten',
            'description' => '',
            'slug' => 'norrbotten'
        ],
        [
            'name' => 'Västerbotten',
            'description' => '',
            'slug' => 'vasterbotten',
        ],
        [
            'name' => 'Jämtland',
            'description' => '',
            'slug' => 'jamtland'
        ],
        [
            'name' => 'Västernorrland',
            'description' => '',
            'slug' => 'vasternorrland'
        ],
        [
            'name' => 'Gävleborg',
            'description' => '',
            'slug' => 'gavleborg'
        ],
        [
            'name' => 'Dalarna',
            'description' => '',
            'slug' => 'dalarna'
        ],
        [
            'name' => 'Västmanland',
            'description' => '',
            'slug' => 'vastmanland'
        ],
        [
            'name' => 'Uppsala',
            'description' => '',
            'slug' => 'uppsala'
        ],
        [
            'name' => 'Stockholms län',
            'description' => '',
            'slug' => 'stockholmslan'
        ],
        [
            'name' => 'Södermanland',
            'description' => '',
            'slug' => 'sodermanland'
        ],
        [
            'name' => 'Örebro',
            'description' => '',
            'slug' => 'orebro'
        ],
        [
            'name' => 'Värmland',
            'description' => '',
            'slug' => 'varmland'
        ],
        [
            'name' => 'Västra Götaland',
            'description' => '',
            'slug' => 'vastragötaland'
        ],
        [
            'name' => 'Östergötland',
            'description' => '',
            'slug' => 'ostergotland'
        ],
        [
            'name' => 'Jönköping',
            'description' => '',
            'slug' => 'jonkoping'
        ],
        [
            'name' => 'Kalmar',
            'description' => '',
            'slug' => 'kalmar'
            

        ],
        [
            'name' => 'Gotland',
            'description' => '',
            'slug' => 'gotland'
        ],
        [
            'name' => 'Halland',
            'description' => '',
            'slug' => 'halland'
        ],
        [
            'name' => 'Kronoberg',
            'description' => '',
            'slug' => 'kronoberg'
        ],
        [
            'name' => 'Blekinge',
            'description' => '',
            'slug' => 'blekinge'
        ],
        [
            'name' => 'Skåne',
            'description' => '',
            'slug' => 'skane'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(static::$counties as $county){
            if(County::where('name', $county['name'])->doesntExist()){
                County::create([
                    'name' => $county['name'],
                    'description' => $county['description'],
                    'slug' => $county['slug'],
                ]);
            }
        }
    }
}
