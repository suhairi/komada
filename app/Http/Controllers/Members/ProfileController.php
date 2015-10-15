<?php

namespace App\Http\Controllers\Members;

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

        $profiles = Profile::where('status', 1)->count();
        $active = $profiles;

        $profiles = Profile::all();
        $keseluruhan = $profiles->count();

        $max = 0;

        foreach($profiles as $profile)
        {
            $profile->no_anggota = (int)$profile->no_anggota;

            if($profile->no_anggota != 0 && $profile->no_anggota > $max)
                $max = $profile->no_anggota;
        }

        $anggota = ['keseluruhan' => $keseluruhan, 'aktif' => $active, 'no_akhir' => $max];

        return View('members.profile.addUser', compact('anggota'));
    }

    public function edit($id)
    {
        $profile = Profile::where('no_anggota', $id)
            ->first();

        $status = ['1' => 'AKTIF', '0' => 'TIDAK AKTIF'];

        return View('members.profile.edit', compact('profile', 'status'));
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

        if($profile->save())
        {
            if(Request::get('status') == 0 && $inactive == true)
            {
                Inactive::create([
                    'no_anggota'    => Request::get('no_anggota'),
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
