<?php

use App\Inactive;
use App\Tka;
use Illuminate\Database\Seeder;
use App\Profile;
use Carbon\Carbon;
use App\Yuran;
use App\Potongan;

class UserTableSeeder4 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inactive

        // 2012
        Profile::where('no_anggota', '625')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '625', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2012', '1', '30'), 'updated_at' => Carbon::createFromDate('2012', '1', '30')]);
        Profile::where('no_anggota', '23')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '23', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2012', '1', '30'), 'updated_at' => Carbon::createFromDate('2012', '1', '30')]);
        Profile::where('no_anggota', '277')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '277', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2012', '1', '30'), 'updated_at' => Carbon::createFromDate('2012', '1', '30')]);
        Profile::where('no_anggota', '51')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '51', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2012', '1', '30'), 'updated_at' => Carbon::createFromDate('2012', '1', '30')]);
        Profile::where('no_anggota', '42')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '42', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2012', '1', '30'), 'updated_at' => Carbon::createFromDate('2012', '1', '30')]);

        // 2013
        Profile::where('no_anggota', '269')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '269', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2013', '1', '30'), 'updated_at' => Carbon::createFromDate('2013', '1', '30')]);
        Profile::where('no_anggota', '1063')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '1063', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2013', '1', '30'), 'updated_at' => Carbon::createFromDate('2013', '1', '30')]);
        Profile::where('no_anggota', '861')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '861', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2013', '1', '30'), 'updated_at' => Carbon::createFromDate('2013', '1', '30')]);
        Profile::where('no_anggota', '387')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '387', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2013', '1', '30'), 'updated_at' => Carbon::createFromDate('2013', '1', '30')]);
        Profile::where('no_anggota', '50')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '50', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2013', '1', '30'), 'updated_at' => Carbon::createFromDate('2013', '1', '30')]);
        Profile::where('no_anggota', '24')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '24', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2013', '1', '30'), 'updated_at' => Carbon::createFromDate('2013', '1', '30')]);

        // 2014
        Profile::where('no_anggota', '303')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '303', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2014', '1', '30'), 'updated_at' => Carbon::createFromDate('2014', '1', '30')]);
        Profile::where('no_anggota', '796')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '796', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2014', '1', '30'), 'updated_at' => Carbon::createFromDate('2014', '1', '30')]);

        // 2015
        Profile::where('no_anggota', '942')->where('bangsa', 'CHINA')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '942', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2015', '1', '30'), 'updated_at' => Carbon::createFromDate('2015', '1', '30')]);
        Profile::where('no_anggota', '90')->update(['status' => 0]);
        Inactive::create(['no_anggota' => '90', 'catatan' => '', 'status' => 1, 'created_at' => Carbon::createFromDate('2015', '1', '30'), 'updated_at' => Carbon::createFromDate('2015', '1', '30')]);

        // Yuran
        for($i=Carbon::now()->format('Y'); $i<=Carbon::now()->format('Y'); $i++)
        {
            $profiles = Profile::where('status', 1)->get();
            $tka = Tka::where('status', 1)->first();

            foreach($profiles as $profile) {
                if ($profile->profile_category_id == 1) {
                    for ($j = 1; $j <= 12; $j++)
                    {
                        if ($j <= 9)
                            $bulan_tahun = '0' . $j . '-' . $i;
                        else
                            $bulan_tahun = $j . '-' . $i;


                        if($bulan_tahun != '10-2015')
                        {
                            Yuran::create([
                                'no_gaji'       => $profile->no_gaji,
                                'bulan_tahun'   => $bulan_tahun,
                                'yuran'         => $profile->jumlah_yuran_bulanan,
                                'tka'           => $tka->jumlah,
                                'takaful'       => '10.00',
                                'potongan'      => 0.00,
                                'zon_gaji_id'   => $profile->zon_gaji_id,
                                'created_at'    => Carbon::createFromDate($i, $j, '25'),
                                'updated_at'    => Carbon::createFromDate($i, $j, '25')
                            ]);
                        }

                        if($bulan_tahun == '10-2015')
                            $j = 13;
                    }
                }
            }
        }
    }
}
