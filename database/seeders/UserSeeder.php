<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name'    => 'Super',
            'last_name'     => 'Admin',
            'email'         =>  'admin@gmail.com',
            'mobile_number' =>  '9028187696',
            'password' => bcrypt('Password'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'first_name'    => 'User',
            'last_name'     => 'CS',
            'email'         =>  'user@gmail.com',
            'mobile_number' =>  '9028187696',
            'password' => bcrypt('Password'),
        ]);

        $user->assignRole('user');

        $teknisi = User::create([
            'first_name'    => 'Teknisi',
            'last_name'     => '1',
            'email'         =>  'teknisi@gmail.com',
            'mobile_number' =>  '9028187696',
            'password' => bcrypt('Password'),
        ]);

        $teknisi->assignRole('teknisi');

        $teknisi = User::create([
            'first_name'    => 'Teknisi',
            'last_name'     => '2',
            'email'         =>  'teknisi2@gmail.com',
            'mobile_number' =>  '9028187696',
            'password' => bcrypt('Password'),
        ]);

        $teknisi->assignRole('teknisi');
    }
}
