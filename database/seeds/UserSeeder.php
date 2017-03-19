<?php

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
        $email = 'nomanbutt8322@yahoo.com';

        if(!\App\User::where('email', $email )->exists()){
            \App\User::create([
                'name' => 'testing',
                'email' => 'nomanbutt8322@yahoo.com',
                'password' => $password = bcrypt('secret'),
                'remember_token' => str_random(10),
            ]);
        }

    }
}
