<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Bayaran;
use App\Perkhidmatan;
use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use App\Zon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function carian()
    {
        return View('members.laporan.carian');
    }

    public function carianPost()
    {
        $profile = Profile::find(Request::get('no_anggota'))->first();

//        dd($profiles);

        return View('members.laporan.kadAhli', compact('bil', 'profile'));
    }

    /*
     *   1 - Laporan Bayaran Individu
     */

    public function lapBayaranIndividu() {
        return View('members.laporan.lapBayaranIndividu');
    }

    public function lapBayaranIndividuPost() {

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        if($profile == null) {
            Session::flash('error', 'Gagal. Tiada ahli yang berdaftar dengan no gaji *' .Request::get('no_gaji') . '*.');
            return Redirect::back();
        }

        $nama = $profile->nama;
        $no_gaji = Request::get('no_gaji');


        $fees = Yuran::where('no_gaji', Request::get('no_gaji'))
            ->where('bulan_tahun', 'like', '%' . date('Y'))
            ->get();

        if($fees->isEmpty()){
            Session::flash('error', 'Gagal. Tiada maklumat bayaran pada tahun ini.');
            return Redirect::back();
        }

        $bayaran = [];

        foreach($fees as $fee) {

            $profile = Profile::where('no_gaji', Request::get('no_gaji'))
                ->first();

            $bulan = explode('-', $fee->bulan_tahun);
            $bulan = (int)$bulan[0];

            if($bulan < 10)
                $bulan = '0' . $bulan;

            // Yuran Bulanan

            $jumlah = $fee->yuran + $fee->pertaruhan + $fee->tka + $fee->takaful + $fee->potongan;

            array_push($bayaran, ['bulan' => $bulan, 'perkara' => 'Yuran Bulanan', 'catatan' => $profile->zon_gaji->nama, 'jumlah' => $jumlah]);

            // Bayaran pwt 

            if($fee->pwt != 0)
                array_push($bayaran, ['bulan' => $bulan, 'perkara' => 'PWT', 'catatan' => $profile->zon_gaji->nama, 'jumlah' => $fee->pwt]); 


            // Bayaran Tunai
            $bulan = explode('-', $fee->bulan_tahun);
            $bulan = $bulan[0];

            $tunai = Bayaran::where('no_gaji', Request::get('no_gaji'))
                ->where('created_at', 'like', date('Y') . '-' . $bulan . '%')
                ->get();

            if(!$tunai->isEmpty()) {

                $bulan = explode('-', $fee->bulan_tahun);
                foreach($tunai as $cash) {

                    $catatan = Perkhidmatan::where('id', $cash->akaunpotongan_id)
                        ->first();

                    $catatan = $catatan->nama;

                    $jumlah = $cash->jumlah;
                    array_push($bayaran, ['bulan' => $bulan[0], 'perkara' => 'Bayaran Tunai/Cek', 'catatan' => $catatan, 'jumlah' => $jumlah]);
                }
            } // end if tunai is not empty

        } //end foreach


        return View('members.laporan.janaan.lapBayaranIndividu', compact('nama', 'no_gaji', 'bayaran'));

    }

    /*
     *  2 - Laporan Penyata Gaji Mengikut Zon
     */

    public function lapGajiIndividu()
    {
        $zones = Zon::all();

        return View('members.laporan.lapGajiIndividu', compact('zones'));
    }

    public function lapGajiIndividuGenerate() {

        $validation = Validator::make(Request::all(), [
            'zon'   => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        $zon    = Request::get('zon');
        $bulan  = Request::get('bulan');
        $tahun  = Request::get('tahun');

        if($validation->fails())
        {
            Session::flash('error', 'Gagal. Sila pilih ruangan yang disediakan');
            return Redirect::back();
        }

        $bulan = '' . Request::get('bulan');

        if(Request::get('bulan') < 10)
        {
            $bulan = '0' . Request::get('bulan');
        }

        $bulan_tahun = $bulan . '-' . Request::get('tahun');

        $bahagian = Zon::where('kod', Request::get('zon'))
            ->first();

        // $bahagian = $bahagian->nama;

        $profiles = Profile::where('zon_gaji_id', $bahagian->id)
            ->where('status', 1)
            ->get();

        $persons = [];
        $jumlahBesar = 0.00;

        foreach($profiles as $profile)
        {
            // dd('here');
            // yuran, tka, takaful
            $yuran = $this->getYuran($profile->no_gaji, $bulan_tahun);

            if($yuran == null) {
                Session::flash('error', 'Gagal. Laporan tidak dapat dijana. Yuran bagi ' . $bulan_tahun . ' belum diproses.');
                return Redirect::back();
            }

            // sumbangan kematian
            $sumbangan = number_format($this->getSumbangan($bulan_tahun), 2);

            // jumlah yuran + bayaran tunai/cek
            // Pinjaman. WT, Kecemasan, Buku Sekolah, Roadtax, Tayar Bateri, Insurans
            $pwt = $this->getBayaran($profile->no_gaji, $bulan_tahun, 1);
            $bs = $this->getBayaran($profile->no_gaji, $bulan_tahun, 2);
            $rt = $this->getBayaran($profile->no_gaji, $bulan_tahun, 3);
            $ins = $this->getBayaran($profile->no_gaji, $bulan_tahun, 4);
            $tb = $this->getBayaran($profile->no_gaji, $bulan_tahun, 5);
            $kc = $this->getBayaran($profile->no_gaji, $bulan_tahun, 6);

            
            $jumlah = $yuran->yuran + $yuran->tka + $yuran->takaful + $sumbangan +
                $pwt['jumlah'] + $pwt['cp'] + $pwt['ins'] +
                $kc['jumlah'] + $kc['cp'] + $kc['ins'] +
                $bs['jumlah'] + $rt['jumlah'] +
                $tb['jumlah'] + $tb['cp'] +
                $ins['jumlah'] + $profile->jumlah_pertaruhan;

            array_push($persons, [
                'no_gaji'       => $profile->no_gaji,
                'nama'          => $profile->nama,
                'yuran'         => number_format($yuran->yuran, 2),
                'tka'           => number_format($yuran->tka, 2),
                'pertaruhan'    => number_format($profile->jumlah_pertaruhan, 2),
                'takaful'       => number_format($yuran->takaful, 2),
                'sumbangan'     => number_format($sumbangan, 2),
                'pwt'           => number_format($pwt['jumlah'], 2),
                'pwtCP'         => number_format($pwt['cp'], 2),
                'pwtIns'        => number_format($pwt['ins'], 2),
                'kecemasan'     => number_format($kc['jumlah'], 2),
                'kecemasanCP'   => number_format($kc['cp'], 2),
                'kecemasanIns'  => number_format($kc['ins'], 2),
                'bs'            => number_format($bs['jumlah'], 2),
                'rt'            => number_format($rt['jumlah'], 2),
                'tb'            => number_format($tb['jumlah'], 2),
                'tbCP'            => number_format($tb['jumlah'], 2),
                'ins'           => number_format($ins['jumlah'], 2),
                'jumlah'        => number_format($jumlah, 2)
            ]);

            $jumlahBesar += $jumlah;
        }

        $bil = 1;

        return View('members.laporan.janaan.lapGajiIndividu', compact('bil', 'bahagian', 'profiles', 'persons', 'jumlahBesar', 'zon', 'bulan', 'tahun'));

    }

    /*
     *  3 - Laporan Potongan Gaji Individu
     */

    public function lapPotonganGaji() {
        return View('members.laporan.lapPotonganGaji');
    }

    public function lapPotonganGajiGenerate() {

        $month = Request::get('bulan');
        $year = Request::get('tahun');
//        $tarikh = $year . '-' . $month . '-' . '01 00:00:00';

        $yuran = Yuran::where('bulan_tahun', 'like', $month . '-' . $year . '%')
            ->first();

        $tarikh = $yuran->created_at;

        $perkara = Array();

        $zones = Zon::all();

        foreach($zones as $zone) {

            // 1 - Yuran, pertaruhan, tka, takaful

            $perkara[$zone->kod]['yuran'] = 0.00;
            $perkara[$zone->kod]['per'] = 0.00;
            $perkara[$zone->kod]['tka'] = 0.00;
            $perkara[$zone->kod]['takaful'] = 0.00;

            $fees = Yuran::where('bulan_tahun', Request::get('bulan') . '-' . Request::get('tahun'))
                ->get();

            if($fees->isEmpty()) {
                Session::flash('error', 'Gagal. Laporan tidak dapat dijana. Yuran Bulan ini belum diproses.');
                return Redirect::back();
            }

            $profiles = Profile::where('zon_gaji_id', $zone->kod)
                ->where('status', 1)
                ->get();

            if($profiles->isEmpty()) {
                Session::flash('error', 'Gagal. Tiada maklumat profile ahli KOMADA. Sila hubungi Programmer');
                return Redirect::back();
            }

            foreach($profiles as $profile) {

                $fee = Yuran::where('no_gaji', $profile->no_gaji)
                    ->where('bulan_tahun', Request::get('bulan') . '-' . Request::get('tahun'))
                    ->first();

                if($fee == null) {
                    dd($profile->no_gaji);
                }

                $perkara[$zone->kod]['yuran'] += $fee->yuran;
                $perkara[$zone->kod]['per'] += $fee->pertaruhan;
                $perkara[$zone->kod]['tka'] += $fee->tka;
                $perkara[$zone->kod]['takaful'] += $fee->takaful;
            }

            // 2 - Yuran Tambahan

            $perkara[$zone->kod]['sumbangan'] = 0.00;

            $sumbangans = Yurantambahan::where('created_at', '<=', $tarikh)
                ->get();

            if(!$sumbangans->isEmpty()) {

                foreach($sumbangans as $sumbangan) {

                    $profiles = Profile::where('zon_gaji_id', $zone->kod)
                        ->where('status', 1)
                        ->get();

                    if($profiles->isEmpty()) {
                        Session::flash('error', 'Gagal. Tiada maklumat profile ahli KOMADA. Sila hubungi Programmer');
                        return Redirect::back();
                    }

                    foreach($profiles as $profile)
                        $perkara[$zone->kod]['sumbangan'] += $sumbangan->jumlah;
                }
            }

            // 3 - PWT -> perkhidmatan_id = 1

            $perkara[$zone->kod]['pwt'] = 0.00;

            $accounts = AkaunPotongan::where('status', 1)
                ->where('perkhidmatan_id', 1)
                ->where('created_at', '<=', $tarikh)
                ->get();

            if(!$accounts->isEmpty()){

                foreach($accounts as $account) {

                    if($zone->kod == $this->getZonGaji($account->no_gaji))
                        $perkara[$zone->kod]['pwt'] += $account->bulanan;
                }
            }

            // 4 - Buku Sekolah -> perkhidmatan_id = 2

            $perkara[$zone->kod]['bs'] = 0.00;

            $accounts = AkaunPotongan::where('status', 1)
                ->where('perkhidmatan_id', 2)
                ->where('created_at', '<=', $tarikh)
                ->get();

            if(!$accounts->isEmpty()){

                foreach($accounts as $account) {

                    if($zone->kod == $this->getZonGaji($account->no_gaji))
                        $perkara[$zone->kod]['bs'] += $account->bulanan;
                }
            }

            // 5 - RoadTax - perkhidmatan_id = 3

            $perkara[$zone->kod]['rt'] = 0.00;

            $accounts = AkaunPotongan::where('status', 1)
                ->where('perkhidmatan_id', 3)
                ->where('created_at', '<=', $tarikh)
                ->get();

            if(!$accounts->isEmpty()){

                foreach($accounts as $account) {

                    if($zone->kod == $this->getZonGaji($account->no_gaji))
                        $perkara[$zone->kod]['rt'] += $account->bulanan;
                }
            }

            // 6 - Insurans - perkhidmatan_id = 4

            $perkara[$zone->kod]['ins'] = 0.00;

            $accounts = AkaunPotongan::where('status', 1)
                ->where('perkhidmatan_id', 4)
                ->where('created_at', '<=', $tarikh)
                ->get();

            if(!$accounts->isEmpty()){

                foreach($accounts as $account) {

                    if($zone->kod == $this->getZonGaji($account->no_gaji))
                        $perkara[$zone->kod]['ins'] += $account->bulanan;
                }
            }

            // 7 - Tayar / Bayar - perkhidmatan_id = 5

            $perkara[$zone->kod]['ins'] = 0.00;

            $accounts = AkaunPotongan::where('status', 1)
                ->where('perkhidmatan_id', 5)
                ->where('created_at', '<=', $tarikh)
                ->get();

            if(!$accounts->isEmpty()){

                foreach($accounts as $account) {

                    if($zone->kod == $this->getZonGaji($account->no_gaji))
                        $perkara[$zone->kod]['tb'] += $account->bulanan;
                }
            }

            // 8 - Kecemasan - perkhidmatan_id = 6

            $perkara[$zone->kod]['kc'] = 0.00;

            $accounts = AkaunPotongan::where('status', 1)
                ->where('perkhidmatan_id', 6)
                ->where('created_at', '<=', $tarikh)
                ->get();

            if(!$accounts->isEmpty()){

                foreach($accounts as $account) {

                    if($zone->kod == $this->getZonGaji($account->no_gaji))
                        $perkara[$zone->kod]['kc'] += $account->bulanan;
                }
            }
        }

        return View('members.laporan.janaan.lapPotonganGajiGenerate', compact('zones', 'perkara'));
    }


    /*
     *  Helper Functions
     */

    protected function getYuran($no_gaji, $bulan_tahun) {
        $yuran = Yuran::where('no_gaji', $no_gaji)
            ->where('bulan_tahun', $bulan_tahun)
            ->first();

        return $yuran;
    }

    protected function getSumbangan($bulan_tahun) {
        $tarikh = explode('-', $bulan_tahun);
        $tarikh = $tarikh[1] . '-' . $tarikh[0];

        $sumbangan = Yurantambahan::where('created_at', 'like', $tarikh . '%')
            ->sum('jumlah');

        return $sumbangan;
    }

    protected function getBayaran($no_gaji, $bulan_tahun, $perkhidmatan_id) {
        $tarikh = explode('-', $bulan_tahun);
        $tarikh = $tarikh[1] . '-' . $tarikh[0];
        $bayaran = [];

        $yuran = Yuran::where('no_gaji', $no_gaji)
            ->where('created_at', 'like', $tarikh . '%')
            ->first();

        if($yuran != null)
            $tarikhYuran = $yuran->created_at;

        $akaun = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('perkhidmatan_id', $perkhidmatan_id)
            ->where('status', 1)
            ->where('created_at', '<=', $tarikhYuran)
            ->first();

        if($akaun != null) {
            $bayaran = [
                'jumlah'    => $akaun->bulanan,
                'cp'        => $akaun->caj_perkhidmatan,
                'ins'       => $akaun->insurans
            ];
        } else {
            $bayaran = [
                'jumlah'    => 0.00,
                'cp'        => 0.00,
                'ins'       => 0.00
            ];
        }

        return $bayaran;
    }

    protected function getZonGaji($no_gaji) {

        $profile = Profile::where('no_gaji', $no_gaji)
            ->first();

        if($profile != null)
            return $profile->zon_gaji_id;
        else
            return '';
    }

}
