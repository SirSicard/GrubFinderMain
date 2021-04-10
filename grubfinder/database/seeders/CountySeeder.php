<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    protected static $counties = [
        [
            'name' => 'Norrbotten'
        ],
        [
            'name' => 'Västerbotten'
        ],
        [
            'name' => 'Jämtland'
        ],
        [
            'name' => 'Västernorrland'
        ],
        [
            'name' => 'Gävleborg'
        ],
        [
            'name' => 'Dalarna'
        ],
        [
            'name' => 'Västmanland'
        ],
        [
            'name' => 'Uppsala'
        ],
        [
            'name' => 'Stockholms län'
        ],
        [
            'name' => 'Södermanland'
        ],
        [
            'name' => 'Örebro'
        ],
        [
            'name' => 'Värmland'
        ],
        [
            'name' => 'Västra Götaland'
        ],
        [
            'name' => 'Östergötland'
        ],
        [
            'name' => 'Jönköping'
        ],
        [
            'name' => 'Kalmar'
        ],
        [
            'name' => 'Gotland'
        ],
        [
            'name' => 'Halland'
        ],
        [
            'name' => 'Kronoberg'
        ],
        [
            'name' => 'Blekinge'
        ],
        [
            'name' => 'Skåne'
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
                County::create();
            }
        }
    }
}
