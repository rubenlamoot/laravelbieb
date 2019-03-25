<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\Address', 5)->create();
        DB::table('addresses')->insert([
            'street' => 'Kloosterstraat',
            'house_nr' => '5',
            'postal_code' => '8647',
            'city' => 'Lo-Reninge',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}