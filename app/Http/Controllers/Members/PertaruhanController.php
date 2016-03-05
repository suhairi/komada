<?php

namespace App\Http\Controllers\Members;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Request;
use App\Http\Controllers\Controller;
use App\Profile;

class PertaruhanController extends Controller
{
    public function index()
    {
        return View('members.pertaruhan');
    }

    public function indexPost()
    {

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))->first();

        if(empty($profile))
        {
            Session::flash('error', 'Gagal. No Gaji tidak didaftarkan sebagai ahli KOMADA.');
            return Redirect::route('members.pertaruhan.index')->withInput();
        }
        else
            return View('members.pertaruhan.daftar', compact('profile'));

    }

    public function daftarPost()
    {
        if(Request::get('jumlah_pertaruhan') != "0.00")
        {
            $profile = Profile::where('no_gaji', Request::get('no_gaji'))->first();
            $profile->jumlah_pertaruhan = Request::get('jumlah_pertaruhan');

            $profile->save();

            Session::flash('success', 'Berjaya, Wang Pertaruhan berjaya didaftarkan.');
        }

        return Redirect::route('members.pertaruhan.index');
    }
}
