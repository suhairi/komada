<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Profile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Request;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    public function pwt()
    {
        return View('members.calculator.pwt');
    }

    public function pwtPost()
    {

        $found = false;
        $akaunPotongan = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('status', 1)
            ->get();

        if(!$akaunPotongan->isEmpty())
            $found = true;

        // check if the no_gaji one of ahli komada
        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->get();

        if($profile->isEmpty())
        {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tidak didaftarkan sebagai anggota KOMADA.');
            return Redirect::back()->withInput();
        }

        // check wether if the no_gaji active or inactive
        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->where('status', 0)
            ->get();

        if(!$profile->isEmpty())
        {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tidak aktif.');
            return Redirect::back()->withInput();
        }

        Session::flash('no_gaji', Request::get('no_gaji'));

        return View('members.calculator.pwt_calculator', compact('akaunPotongan', 'found'));
    }
}
