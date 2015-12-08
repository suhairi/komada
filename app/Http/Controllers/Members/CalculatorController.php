<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Bayaran;
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
            ->where('perkhidmatan_id', 1)
            ->get();

        $info = [];
        $kelayakan = true;

        if(!$akaunPotongan->isEmpty())
        {

            $akaun = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
                ->where('status', 1)
                ->where('perkhidmatan_id', 1)
                ->first();

            $baki = $this->getBaki(Request::get('no_gaji'));
            $tempoh = $this->getBakiTempoh(Request::get('no_gaji'));

            // LANGSAI
            // Formula :-
            // Langsai = (baki - lebihan kadar) + 6 bulan kadar

            $langsai = $this->getBaki(Request::get('no_gaji')) - $this->getLebihanKadar(Request::get('no_gaji')) + $this->getTambahanKadar(Request::get('no_gaji'));

            $layak = $this->getJumlahLayak(Request::get('no_gaji'));

            $info = [$baki, $tempoh, $langsai, $layak];

            if($layak < $langsai)
                $kelayakan = false;

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

        $layakPinjam = $this->getJumlahLayak(Request::get('no_gaji'));

        Session::put('no_gaji', Request::get('no_gaji'));

        return View('members.calculator.pwt_calculator', compact('akaunPotongan', 'found', 'info', 'akaun', 'kelayakan', 'layakPinjam'));
    }


    // Helper Functions

    protected function getBakiTempoh($no_gaji)
    {
        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->where('perkhidmatan_id', 1)
            ->first();

        $bilPotongan = Bayaran::where('no_gaji', $no_gaji)
            ->where('created_at', '>=', $akaun->created_at->format('Y-m-d') . '%')
            ->count();

        $bakiTempoh = $akaun->tempoh - $bilPotongan;

        return $bakiTempoh;
    }

    protected function getBaki($no_gaji)
    {
        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->where('perkhidmatan_id',1)
            ->first();

        // #####################################################################################
        // bugs here
        // since potongan is inclusive with other pinjamans, the jumlah is not exact already.
        // need to find way to fix this.

        // solution to try :-
        // 1. compare tarikh, and get jumlah bayaran by doing the formula again here

        // #####################################################################################
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
            ->where('perkhidmatan_id', 1)
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
            ->where('perkhidmatan_id', 1)
            ->first();

        $kadarSebulan = ($akaun->jumlah_keseluruhan - $akaun->insurans - $akaun->caj_perkhidmatan) / $akaun->tempoh;

        $lebihanKadar = 6 * $kadarSebulan;

        return $lebihanKadar;
    }

    protected function getJumlahLayak($no_gaji)
    {
        $jumlah = Yuran::where('no_gaji', $no_gaji)
            ->sum('yuran');

        // missing => $jumlah = $jumlah + jumlah_caruman_lama

        if($jumlah < 10000)
            $layak = 2 * $jumlah;
        else
            $layak = 0.8 * $jumlah;

        return $layak;
    }




}
