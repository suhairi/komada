<?php

namespace App\Http\Controllers\Members;

use App\Jantina;
use App\ProfileCategory;
use App\Zon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
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

        $zon_gaji = Zon::lists('nama', 'id');
        $category = ProfileCategory::lists('nama', 'id');

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

        return View('members.profile.addUser', compact('anggota', 'zon_gaji', 'category'));
    }

    public function addUserPost()
    {
        $validation = Validator::make(Request::all(), [
            'no_anggota'    => 'required|numeric',
            'no_gaji'       => 'required|numeric',
            'nama'          => 'required',
            'nokp'          => 'required',
            'jantina'       => 'required',
            'bangsa'        => 'required',
            'jumlah_yuran_bulanan'  => 'required|numeric',
            'zon_gaji_id'   => 'required|numeric'
        ]);

        if($validation->fails())
        {
            Session::flash('error', 'Sila isikan ruangan dengan format yang betul');
            return Redirect::back()->withInput()->withErrors($validation);
        }

//        return Request::all();

        $profile = new Profile();
        $profile->fill(Request::all());

        if($profile->save())
            Session::flash('success', 'Berjaya. Anggota baru telah didaftarkan');
        else
            Session::flash('error', 'Gagal. Anggota baru gagal didaftarkan');

        return Redirect::route('members.profiles.addUser');
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

        $zon = Zon::lists('nama', 'kod');

        $jantina = Jantina::lists('nama', 'id');

        return View('members.profile.edit', compact('profile', 'status', 'anggota', 'zon', 'jantina'));
    }

    public function update($id)
    {
        $profile = Profile::where('no_anggota', Request::get('no_anggota'))
            ->first();

        if(Request::get('status') == 0)
            $profile->status = 0;

        $profile->nama          = strtoupper(Request::get('nama'));
        $profile->nokp          = Request::get('nokp');
        $profile->email         = strtoupper(Request::get('email'));
        $profile->zon_gaji_id   = Request::get('zon_gaji_id');



        if($profile->save())
        {
            if(Request::get('status') == 0)
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
