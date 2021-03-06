<?php

use App\Perkhidmatan;
use App\ProfileCategory;
use App\Startup;
use App\Tka;
use App\Sumbangan;
use Illuminate\Database\Seeder;
use App\User;
use App\Zon;
use App\Jantina;
use App\Status;
use App\Takaful;
use App\Profile;

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
        User::create(array('name' => 'Nona Azizah', 'email' => 'azizah@gmail.com', 'password' => Hash::make('azizah')));

        Perkhidmatan::create(array("nama" => "WANG TUNAI"));
        Perkhidmatan::create(array("nama" => "BUKU SEKOLAH"));
        Perkhidmatan::create(array("nama" => "CUKAI JALAN"));
        Perkhidmatan::create(array("nama" => "INSURANS"));
        Perkhidmatan::create(array("nama" => "TAYAR / BATERI"));
        Perkhidmatan::create(array("nama" => "KECEMASAN"));

        Startup::create(['id' => 1, 'nama' => 'YURAN', 'nilai' => '4184963.80', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 2, 'nama' => 'TKA', 'nilai' => '90721.52', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 3, 'nama' => 'BIASA', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 4, 'nama' => 'PERTARUHAN', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 5, 'nama' => 'TAYAR / BATERI', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
        Startup::create(['id' => 6, 'nama' => 'INSURANS', 'nilai' => '00.00', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);

        Tka::create(['id' => 1, 'jumlah' => 6.00, 'status' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);

        Sumbangan::create(['id' => 1, 'nama' => 'Sumbangan Kematian']);
        Sumbangan::create(['id' => 2, 'nama' => 'Sumbangan IPTA']);
        Sumbangan::create(['id' => 3, 'nama' => 'Sumbangan Bencana']);

        Zon::create(['kod' => '01', 'nama' => 'BAHAGIAN KHIDMAT PENGURUSAN']);
        Zon::create(['kod' => '02', 'nama' => 'BAHAGIAN INDUSTRI PADI']);
        Zon::create(['kod' => '03', 'nama' => 'BAHAGIAN INDUSTRI PADI DAN BUKAN PADI']);
        Zon::create(['kod' => '04', 'nama' => 'BAHAGIAN PENGURUSAN INSTITUSI LADANG']);
        Zon::create(['kod' => '05', 'nama' => 'BAHAGIAN PERANCANGAN DAN TEKNOLOGI MAKLUMAT']);
        Zon::create(['kod' => '06', 'nama' => 'BAHAGIAN PENGURUSAN EMPANGAN DAN SUMBER AIR']);
        Zon::create(['kod' => '07', 'nama' => 'BAHAGIAN PENGAIRAN DAN SALIRAN']);
        Zon::create(['kod' => '08', 'nama' => 'BAHAGIAN KHIDMAT MEKANIKAL DAN INFRASTRUKTUR']);
        Zon::create(['kod' => '09', 'nama' => 'PERKHIDMATAN MEKANIKAL']);
        Zon::create(['kod' => '10', 'nama' => 'BAHAGIAN PENGURUSAN WILAYAH']);
        Zon::create(['kod' => '11', 'nama' => 'WILAYAH 1']);
        Zon::create(['kod' => '12', 'nama' => 'WILAYAH 2']);
        Zon::create(['kod' => '13', 'nama' => 'WILAYAH 3']);
        Zon::create(['kod' => '14', 'nama' => 'WILAYAH 4']);
        Zon::create(['kod' => '20', 'nama' => 'BAYARAN SENDIRI']);

        Jantina::create(['nama' => 'LELAKI']);
        Jantina::create(['nama' => 'PEREMPUAN']);

        Status::create(['nama' => 'AKTIF']);
        Status::create(['nama' => 'PENCEN']);
        Status::create(['nama' => 'TIDAK AKTIF']);
        Status::where('id', 3)->update(['id' => 0]);

        Takaful::create(['jumlah' => '10.00', 'status' => 1]);

        ProfileCategory::create(['id' => 1, 'nama' => 'AHLI BIASA', 'catatan' => '']);
        ProfileCategory::create(['id' => 2, 'nama' => 'PPK', 'catatan' => '']);
        ProfileCategory::create(['id' => 3, 'nama' => 'YPPPM', 'catatan' => 'Y']);
        ProfileCategory::create(['id' => 4, 'nama' => 'SPPM', 'catatan' => 'S']);
        ProfileCategory::create(['id' => 5, 'nama' => 'KOMADA', 'catatan' => '']);
        ProfileCategory::create(['id' => 6, 'nama' => 'PELADANG MART', 'catatan' => 'PM']);

        $profiles = Profile::all();

        foreach($profiles as $profile)
        {
            $no_anggota = (int)$profile->no_anggota;

            if($no_anggota != 0)
            {
                $profile->profile_category_id = 1;
                $profile->save();
            }

            if(strpos($profile->no_anggota, 'Y') !== false)
            {
                $profile->profile_category_id = 3;
                $profile->save();
            }

            if(strpos($profile->no_anggota, 'S') !== false)
            {
                $profile->profile_category_id = 4;
                $profile->save();
            }

            if(strpos($profile->no_anggota, 'PM') !== false)
            {
                $profile->profile_category_id = 6;
                $profile->save();
            }

            if(
                strpos($profile->no_anggota, 'A') !== false ||
                strpos($profile->no_anggota, 'B') !== false ||
                strpos($profile->no_anggota, 'C') !== false ||
                strpos($profile->no_anggota, 'F') !== false
            )
            {
                $profile->profile_category_id = 2;
                $profile->save();
            }

        }

    }
}
