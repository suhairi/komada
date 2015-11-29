<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Profile;
use App\Yuran;
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
        $info = [];

        $akaunPotongan = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('status', 1)
            ->get();

        if(!$akaunPotongan->isEmpty())
        {
            $akaun = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
                ->where('status', 1)
                ->first();

            $baki = $this->getBaki(Request::get('no_gaji'));
            $tempoh = $this->getBakiTempoh(Request::get('no_gaji'));

            // LANGSAI
            // Formula :-
            // langsai = (baki - lebihan kadar) + 6 bulan kadar

            $langsai = $this->getBaki(Request::get('no_gaji')) - $this->getLebihanKadar(Request::get('no_gaji')) + $this->getTambahanKadar(Request::get('no_gaji'));

            $info = [$baki, $tempoh, $langsai];
            $found = true;
        }


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



        return View('members.calculator.pwt_calculator', compact('akaunPotongan', 'found', 'info', 'akaun'));
    }




    // Helper Functions

    protected function getBakiTempoh($no_gaji)
    {
        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->first();

        $bilPotongan = Yuran::where('no_gaji', $no_gaji)
            ->where('created_at', '>=', $akaun->created_at->format('Y-m-d') . '%')
            ->where('potongan', '>', 0)
            ->count();

        $bakiTempoh = $akaun->tempoh - $bilPotongan;

        return $bakiTempoh;
    }

    protected function getBaki($no_gaji)
    {
        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->first();

        $jumlahBayaran = Yuran::where('no_gaji', $no_gaji)
            ->where('created_at', '>=', $akaun->created_at->format('Y-m-d') . '%')
            ->where('potongan', '>', 0)
            ->sum('potongan');

        $baki = $akaun->jumlah_keseluruhan - $jumlahBayaran;

        return $baki;
    }

    protected function getLebihanKadar($no_gaji)
    {
        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->first();

        $kadarSebulan = (($akaun->jumlah_keseluruhan - $akaun->insurans - $akaun->caj_perkhidmatan) - $akaun->jumlah) / $akaun->tempoh;

        $bilPotongan = Yuran::where('no_gaji', $no_gaji)
            ->where('created_at', '>=', $akaun->created_at->format('Y-m-d') . '%')
            ->where('potongan', '>', 0)
            ->count();

        $lebihanKadar = ($akaun->tempoh - $bilPotongan) * $kadarSebulan;

        return $lebihanKadar;
    }

    protected function getTambahanKadar($no_gaji)
    {
        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->first();

        $kadarSebulan = ($akaun->jumlah_keseluruhan - $akaun->insurans - $akaun->caj_perkhidmatan) / $akaun->tempoh;

        $lebihanKadar = 6 * $kadarSebulan;

        return $lebihanKadar;
    }




}
