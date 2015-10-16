<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
         $this->call(UserTableSeeder2::class);
         $this->call(UserTableSeeder3::class);
//         $this->call(UserTableSeeder4::class);

        Model::reguard();
    }
}
