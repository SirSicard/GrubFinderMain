<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    protected static $users = [
        [
            'name' => 'Mr Adminsson',
            'email' => 'mrandersson@admin.com',
            'password' => 'password',
        ],
        [
            'name' => 'Mrs Adminsson',
            'email' => 'mrsandersson@admin.com',
            'password' => 'password',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(static::$users as $user){
            if(User::where('email', $user['email'])->doesntExist()){
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                ]);
            }
        }
    }
}
