<?php

namespace App\Http\Controllers\Members;

use Carbon\Carbon;
use Request;
use App\Inactive;
use App\Profile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function addUser()
    {
        $anggota = [];

        // $anggota['aktif']
        $profiles = Profile::where('status', 1)->count();
        $active = $profiles;

        // $anggota['inactive']
        $inactive = Inactive::where('updated_at', 'like', Carbon::now()->format('Y') . '%')
            ->where('status', 1)
            ->count();

        // $anggota['keseluruhan']
        $profiles = Profile::all();
        $keseluruhan = $profiles->count();

        $max = 0;

        foreach($profiles as $profile)
        {
            $profile->no_anggota = (int)$profile->no_anggota;

            if($profile->no_anggota != 0 && $profile->no_anggota > $max)
                $max = $profile->no_anggota;
        }


        $anggota = ['keseluruhan' => $keseluruhan, 'aktif' => $active, 'inactive' => $inactive, 'no_akhir' => $max];

        return View('members.profile.addUser', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = [];

        // $anggota['aktif']
        $profiles = Profile::where('status', 1)->count();
        $active = $profiles;

        // $anggota['inactive']
        $inactive = Inactive::where('updated_at', 'like', Carbon::now()->format('Y') . '%')
            ->where('status', 1)
            ->count();

        // $anggota['keseluruhan']
        $profiles = Profile::all();
        $keseluruhan = $profiles->count();

        $max = 0;

        foreach($profiles as $profile)
        {
            $profile->no_anggota = (int)$profile->no_anggota;

            if($profile->no_anggota != 0 && $profile->no_anggota > $max)
                $max = $profile->no_anggota;
        }


        $anggota = ['keseluruhan' => $keseluruhan, 'aktif' => $active, 'inactive' => $inactive, 'no_akhir' => $max];

        $profile = Profile::where('no_anggota', $id)
            ->first();

        $status = ['1' => 'AKTIF', '0' => 'TIDAK AKTIF'];

        return View('members.profile.edit', compact('profile', 'status', 'anggota'));
    }

    public function update($id)
    {
        $inactive = false;

        $profile = Profile::where('no_anggota', Request::get('no_anggota'))
            ->first();

        if($profile->status == 1)
            $inactive = true;

        $profile->nama = strtoupper(Request::get('nama'));
        $profile->email = strtoupper(Request::get('email'));
        $profile->status = 0;

        if($profile->save())
        {
            if(Request::get('status') == 0 && $inactive == true)
            {
                Inactive::create([
                    'no_anggota'    => Request::get('no_anggota'),
                    'status'        => 1,
                    'catatan'       => strtoupper(Request::get('catatan'))
                ]);
            }

            Session::flash('success', 'Berjaya. Kemaskini Profil');
        } else {
            Session::flash('error', 'Gagal. Kemaskini Profil');
        }

        return Redirect::route('members.profiles.edit', Request::get('no_anggota'));
    }
}
