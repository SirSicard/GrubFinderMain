<?php

namespace Database\Seeders;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    protected static $statuses = [
        [
            'name' => 'Submitted',
            'description' => '',
            'slug' => 'submitted',
        ],
        [
            'name' => 'Pending',
            'description' => '',
            'slug' => 'pending',
        ],
        [
            'name' => 'Terminated',
            'description' => '',
            'slug' => 'terminated',
        ],
        [
            'name' => 'Verified',
            'description' => '',
            'slug' => 'verified',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(static::$statuses as $status){
            if(Status::where('name', $status['name'])->doesntExist()){
                Status::create([
                    'name' => $status['name'],
                    'description' => $status['description'],
                    'slug' => $status['slug'],
                ]);
            }
        }
    }
}
