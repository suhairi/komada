<?php

use App\Perkhidmatan;
use App\Yuran;
use App\Yurantambahan;
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array('name' => 'Suhairi Abdul Hamid', 'email' => 'suhairi81@gmail.com', 'password' => Hash::make('suhairi')));

        Perkhidmatan::create(array("nama" => "BIASA"));
        Perkhidmatan::create(array("nama" => "CUKAI JALAN"));
        Perkhidmatan::create(array("nama" => "PERTARUHAN"));
        Perkhidmatan::create(array("nama" => "TAYAR / BATERI"));
        Perkhidmatan::create(array("nama" => "INSURANS"));

    }
}
