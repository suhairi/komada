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

        Yuran::create(array("no_anggota" => "1749", "bulan_tahun" => "09-2015", "jumlah" => "25.00", "yuran_tambahan_id" => "1"));
        Yuran::create(array("no_anggota" => "1749", "bulan_tahun" => "10-2015", "jumlah" => "25.00", "yuran_tambahan_id" => "0"));
        Yuran::create(array("no_anggota" => "1749", "bulan_tahun" => "11-2015", "jumlah" => "25.00", "yuran_tambahan_id" => "0"));


        Yurantambahan::create(array("nama" => " ", "jumlah" => "0.00", "catatan" => ""));
        Yurantambahan::create(array("nama" => "Sumbangan Kematian", "jumlah" => "10.00", "catatan" => "Hj Md Zuki"));
        Yurantambahan::where('id', 1)->update(["id" => "0", 'created_at' => '1981-01-30 00:00:00']);
        Yurantambahan::where('id', 2)->update(["id" => "1"]);



    }
}
