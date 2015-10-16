<?php

use App\Inactive;
use Illuminate\Database\Seeder;
use App\Profile;

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
        for($i=Carbon::now()->format('Y') - 3; $i<=Carbon::now()->format('Y'); $i++)
        {
            $profile = Profile::all();
        }
    }
}
