<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        $user = User::create([
            'first_name'    => 'Super',
            'last_name'     => 'Admin',
            'email'         =>  'admin@admin.com',
            'mobile_number' =>  '9028187696',
            'password'      =>  Hash::make('Password'),
            'role_id'       => 1
        ]);
        $user = User::create([
            'first_name'    => 'Super',
            'last_name'     => 'Admin',
            'email'         =>  'rama@gmail.com',
            'mobile_number' =>  '9028187696',
            'password'      =>  Hash::make('Password'),
            'role_id'       => 1
        ]);
        $user = User::create([
            'first_name'    => 'User',
            'last_name'     => 'user',
            'email'         =>  'user@gmail.com',
            'mobile_number' =>  '9028187696',
            'password'      =>  Hash::make('Password'),
            'role_id'       => 2
        ]);
        $user = User::create([
            'first_name'    => 'Teknisi',
            'last_name'     => '2',
            'email'         =>  'teknisi@gmail.com',
            'mobile_number' =>  '9028187696',
            'password'      =>  Hash::make('Password'),
            'role_id'       => 2
        ]);
    }
}
