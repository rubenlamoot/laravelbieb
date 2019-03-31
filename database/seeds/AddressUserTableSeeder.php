<?php

use Illuminate\Database\Seeder;

class AddressUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($x = 1; $x < 8; $x++){
            db::table('address_user')->insert([
               'address_id' => $x,
               'user_id' => $x,
            ]);
        };
    }
}
