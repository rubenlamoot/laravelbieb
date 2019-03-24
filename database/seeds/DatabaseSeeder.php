<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $toTruncate = ['addresses', 'users', 'roles', 'authors', 'books'];

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->toTruncate as $table){
            DB::table($table)->truncate();
        }
        $this->call(AddressesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(BooksTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
