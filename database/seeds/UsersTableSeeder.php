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
        //
        factory('App\User', 5)->create();
        DB::table('users')->insert([
            'name' => 'Ruben Lamoot',
            'email' => 'rubenlamoot@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'first_name' => 'Ruben',
            'last_name' => 'Lamoot',
            'insurance_nr' => '76012601928',
            'address' => 'Kloosterstraat',
            'house_nr' => '5',
            'postal_code' => '8647',
            'city' => 'Lo-Reninge',
            'role_id' => 1,
            'is_active' => 1
        ]);
    }
}
