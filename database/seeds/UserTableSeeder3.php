<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Profile;
use App\Inactive;
use App\ProfileCategory;

class UserTableSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
