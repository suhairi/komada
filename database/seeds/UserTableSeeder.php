<?php

use App\Perkhidmatan;
use App\Startup;
use App\Tka;
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

        Startup::create(['id' => 1, 'nama' => 'YURAN', 'nilai' => '4184963.80', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 2, 'nama' => 'TKA', 'nilai' => '90721.52', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 3, 'nama' => 'BIASA', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 4, 'nama' => 'PERTARUHAN', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 5, 'nama' => 'TAYAR / BATERI', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 6, 'nama' => 'INSURANS', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);

        Tka::create(['id' => 1, 'jumlah' => 6.00, 'status' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);

    }
}
