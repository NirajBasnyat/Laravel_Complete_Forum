<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

        	'avatar' => asset('avatars/avatar.png'),
        	'name' => 'Admin',
        	'email' => 'nirajf5@gmail.com',
        	'password' => bcrypt('password'),
        	'admin' => 1
        ]);

        App\User::create([
            'avatar' => asset('avatars/avatar1.png'),
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'password' => bcrypt('janedoe')
        ]);
    }
}
