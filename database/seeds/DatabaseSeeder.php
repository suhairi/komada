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

        // Startup
         $this->call(UserTableSeeder::class);

        // Profile
//         $this->call(UserTableSeeder2::class);

        // Trim - Profile Category_id
         $this->call(UserTableSeeder3::class);

        // faker data - yuran
//         $this->call(UserTableSeeder4::class);

        Model::reguard();
    }
}
