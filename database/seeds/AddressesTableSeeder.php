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
            'street' => 'Adminstraat',
            'house_nr' => '8',
            'postal_code' => '8647',
            'city' => 'Lo-Reninge',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('addresses')->insert([
            'street' => 'Testlaan',
            'house_nr' => '1',
            'postal_code' => '8000',
            'city' => 'Brugge',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
