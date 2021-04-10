<?php

namespace Database\Seeders;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    protected static $statuses = [
        [
            'name' => 'Submitted'
        ],
        [
            'name' => 'Pending'
        ],
        [
            'name' => 'Terminated'
        ],
        [
            'name' => 'Verified'
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
                Status::create();
            }
        }
    }
}
