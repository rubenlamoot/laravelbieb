<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\User', 5)->create();
        DB::table('users')->insert([
            'name' => 'Ruben Lamoot',
            'email' => 'rubenlamoot@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => Str::random(10),
            'first_name' => 'Ruben',
            'last_name' => 'Lamoot',
            'insurance_nr' => '76012601928',
            'role_id' => 1,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Test1 user',
            'email' => 'test1@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => Str::random(10),
            'first_name' => 'Test1',
            'last_name' => 'Tester1',
            'insurance_nr' => '80022278514',
            'role_id' => 2,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
