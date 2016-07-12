<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Bayaran;
use App\Profile;
use App\Tangguh;
use App\Yuran;
use Carbon\Carbon;
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
            ->where('perkhidmatan_id', Request::get('perkhidmatan_id'))
            ->get();

        $info = [];
        $kelayakan = true;

        if(!$akaunPotongan->isEmpty())
        {
            // This is true for PWT
            // False for repeatative perkhidmatan id

            $akaun = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
                ->where('status', 1)
                ->where('perkhidmatan_id', Request::get('perkhidmatan_id'))
                ->first();

            $baki = $akaun->baki;

            // Formula tempoh = ceiling(baki / bulanan)
            $bakiTempoh = ceil(number_format(($akaun->baki / $akaun->bulanan), 2));

            // LANGSAI
            // Formula :-
            // Langsai = (baki - lebihan kadar) + 6 bulan kadar
            // Lebihankadar = baki tempoh * kadar sebulan;

            $kadarSebulan = $akaun->jumlah * ($akaun->kadar / 100) / 12;
            $lebihanKadar = $bakiTempoh * $kadarSebulan;




            $langsai = $baki - $lebihanKadar + ($kadarSebulan * 6);

            // LAYAK
            // Formula :-
            // layak = ???
            $layak = $this->getJumlahLayak(Request::get('no_gaji'));

            $info = [$baki, $bakiTempoh, $langsai, $layak];

            if($layak < $langsai)
                $kelayakan = false;

            $found = true;
        }

        //###########################################################################################
        
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

        // dd('here');

        //###########################################################################################

        if(!$profile->isEmpty())
        {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tidak aktif.');
            return Redirect::back()->withInput();
        }

        // this to pass profile attribute to the view.
        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        $yuranTerkumpul = $this->getYuranTerkumpul(Request::get('no_gaji'));
        $layakPinjam = $this->getJumlahLayak(Request::get('no_gaji'));
        $pertaruhan = $this->getJumlahPertaruhan(Request::get('no_gaji'));

        if($yuranTerkumpul <= 0)
        {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . ' mempunyai yuran terkumpul RM 0.00. Tidak Layak membuat pinjaman.');
            return Redirect::back()->withInput();
        }



        Session::put('no_gaji', Request::get('no_gaji'));

        return View('members.calculator.pwt_calculator',
            compact('profile', 'akaunPotongan', 'found', 'info', 'akaun', 'kelayakan', 'layakPinjam', 'pertaruhan', 'yuranTerkumpul'));
    }


    // Helper Functions

    protected function getYuranTerkumpul($no_gaji) {
        $jumlah = Yuran::where('no_gaji', $no_gaji)
            ->sum('yuran');

            // dd($jumlah);

        return $jumlah;
    }

    protected function getJumlahLayak($no_gaji) {
        $jumlah = Yuran::where('no_gaji', $no_gaji)
            ->sum('yuran');

        // missing => $jumlah = $jumlah + jumlah_caruman_lama
        // done. by attaching it to yuran (bulan_tahun : jan 2015)
        // so the system will automatically calculate gracefully.
        // $layak = new Array();

        if($jumlah < 10000) {
            $layak['jumlah'] = 2 * $jumlah;
            $layak['desc'] = "(2x yuran terkumpul)";
        } else {
            $layak['jumlah'] = 0.8 * $jumlah;
            $layak['desc'] = "(80% yuran terkumpul)";
        }

        return $layak;
    }

    protected function getJumlahPertaruhan($no_gaji) {

        $jumlah = Yuran::where('no_gaji', $no_gaji)
            ->sum('pertaruhan');

        return $jumlah;
    }




}
