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
            'filename' => '1558357886ReusDeZomerflat.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
