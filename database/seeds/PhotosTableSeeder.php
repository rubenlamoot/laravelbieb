<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('photos')->insert([
            'filename' => '1553857068ReusDeZomerflat.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
