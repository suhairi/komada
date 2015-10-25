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
        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        if(!empty($profile))
        {
            Session::flash('error', 'Gagal. No gaji *' . Request::get('no_gaji') . '* bertindih.');
            return Redirect::back()->withInput();
        }

        $no_anggota = Profile::where('no_anggota', Request::get('no_anggota'))
            ->first();

        if(!empty($no_anggota))
        {
            Session::flash('error', 'Gagal. No anggota *' . Request::get('no_anggota') . '* bertindih.');
            return Redirect::back()->withInput();
        }

        $nokp = Profile::where('nokp', Request::get('nokp'))
            ->first();

        if(!empty($nokp))
        {
            Session::flash('error', 'Gagal. No KP *' . Request::get('nokp') . '* telah wujud, dengan No Gaji *' . $nokp->no_gaji . '*.');
            return Redirect::back()->withInput();
        }


        $validation = Validator::make(Request::all(), [
            'no_anggota'    => 'required|numeric',
            'no_gaji'       => 'required|numeric',
            'profile_category_id' => 'required|numeric',
            'nama'          => 'required',
            'nokp'          => 'required',
            'jantina_id'       => 'required',
            'bangsa'        => 'required',
            'jumlah_yuran_bulanan'  => 'required|numeric',
            'zon_gaji_id'   => 'required|numeric'
        ]);

        if($validation->fails())
        {
            Session::flash('error', 'Sila isikan ruangan dengan format yang betul');
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $profile = new Profile();
        $profile->fill(Request::all());
        $profile->jumlah_yuran_bulanan = Request::get('jumlah_yuran_bulanan');
        $profile->nama = strtoupper(Request::get('nama'));
        $profile->tarikh_ahli = Carbon::now();
        $profile->alamat1 = strtoupper(Request::get('alamat1'));
        $profile->alamat2 = strtoupper(Request::get('alamat2'));
        $profile->jawatan = strtoupper(Request::get('jawatan'));
        $profile->email = strtoupper(Request::get('email'));
        $profile->taraf_jawatan = strtoupper(Request::get('taraf_jawatan'));


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
