<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Bayaran;
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

    public function lapGajiIndividu()
    {
        $zones = Zon::all();

        return View('members.laporan.lapGajiIndividu', compact('zones'));
    }

    public function lapGajiIndividuGenerate()
    {
        $validation = Validator::make(Request::all(), [
            'zon'   => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

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

        $profiles = Profile::where('zon_gaji_id', Request::get('zon'))
            ->where('status', 1)
            ->get();

        $persons = [];
        $jumlahBesar = 0.00;

        foreach($profiles as $profile)
        {
            // yuran, tka, takaful
            $yuran = $this->getYuran($profile->no_gaji, $bulan_tahun);

            if($yuran == null) {
                Session::flash('error', 'Gagal. Laporan tidak dapat dijana. Yuran bagi ' . $bulan_tahun . ' belum diproses.');
                return Redirect::back();
            }

            // sumbangan kematian
            $sumbangan = number_format($this->getSumbangan($bulan_tahun), 2);


            // Pinjaman. WT, Kecemasan, Buku Sekolah, Roadtax, Tayar Bateri, Insurans
            $pwt = $this->getPinjaman($profile->no_gaji, $bulan_tahun, 1);
            $bs = $this->getPinjaman($profile->no_gaji, $bulan_tahun, 2);
            $rt = $this->getPinjaman($profile->no_gaji, $bulan_tahun, 3);
            $ins = $this->getPinjaman($profile->no_gaji, $bulan_tahun, 4);
            $tb = $this->getPinjaman($profile->no_gaji, $bulan_tahun, 5);
            $kc = $this->getPinjaman($profile->no_gaji, $bulan_tahun, 6);

            $jumlah = $yuran->yuran + $yuran->tka + $yuran->takaful + $sumbangan + $pwt + $kc
                + $bs + $rt + $tb + $ins + $profile->jumlah_pertaruhan;


            array_push($persons, [
                'no_gaji'   => $profile->no_gaji,
                'nama'      => $profile->nama,
                'yuran'     => number_format($yuran->yuran, 2),
                'tka'       => number_format($yuran->tka, 2),
                'pertaruhan'=> number_format($profile->jumlah_pertaruhan, 2),
                'takaful'   => number_format($yuran->takaful, 2),
                'sumbangan' => number_format($sumbangan, 2),
                'pwt'       => number_format($pwt, 2),
                'kecemasan' => number_format($kc, 2),
                'bsekolah'  => number_format($bs, 2),
                'rt'        => number_format($rt, 2),
                'tb'        => number_format($tb, 2),
                'ins'        => number_format($ins, 2),
                'jumlah'    => number_format($jumlah, 2)
            ]);

            $jumlahBesar += $jumlah;
        }

        $bil = 1;

        return View('members.laporan.janaan.lapGajiIndividu', compact('bil', 'bahagian', 'persons', 'jumlahBesar'));

    }

    public function lapPotonganGaji() {
        return View('members.laporan.lapPotonganGaji');
    }

    public function lapPotonganGajiGenerate() {

        $month = Request::get('bulan');
        $year = Request::get('tahun');
        $tarikh = $year . '-' . $month;

        $zones = Zon::all();

        $pwt = $bs = [];

        $accounts = AkaunPotongan::where('created_at', 'like', $tarikh . '%')
            ->where('status', 1)
            ->get();

        if($accounts->isEmpty()){
            Session::flash('error', 'Gagal. Tiada data dalam table akaun potongan');
            return Redirect::back();
        }

        foreach($accounts as $account) {

            foreach($zones as $zone) {

                // PWT - perkhidmatan_id = 1
                if($account->perkhidmatan_id == 1) {
                    $zon_gaji = $this->getZonGaji($account->no_gaji);

                    $flag = false;
                    if(!empty($pwt)) {

                        foreach ($pwt as &$pwt_) {
                            if ($pwt_['zon'] == $zon_gaji) {

                                $pwt_['jumlah'] += $account->jumlah;
                                $flag = true;
                            }
                        }
                    }

                    if(!$flag) {
                        array_push($pwt, ['zon' => $zon_gaji, 'jumlah' => number_format($account->jumlah, 2)]);
                    }
                }

                // BS - perkhidmatan_id = 2

            }
        }

        dd($pwt);

        exit;

        return View('members.laporan.janaan.lapPotonganGajiGenerate', compact('zones', 'pwt', 'bs'));
    }

    protected function getYuran($no_gaji, $bulan_tahun)
    {
        $yuran = Yuran::where('no_gaji', $no_gaji)
            ->where('bulan_tahun', $bulan_tahun)
            ->first();

        return $yuran;
    }

    protected function getSumbangan($bulan_tahun)
    {
        $tarikh = explode('-', $bulan_tahun);
        $tarikh = $tarikh[1] . '-' . $tarikh[0];

        $sumbangan = Yurantambahan::where('created_at', 'like', $tarikh . '%')
            ->sum('jumlah');

        return $sumbangan;
    }

    protected function getPinjaman($no_gaji, $bulan_tahun, $perkhidmatan_id)
    {
        $tarikh = explode('-', $bulan_tahun);
        $tarikh = $tarikh[1] . '-' . $tarikh[0];

        $bayaran = Bayaran::where('no_gaji', $no_gaji)
            ->where('perkhidmatan_id', $perkhidmatan_id)
            ->where('created_at', 'like', $tarikh . '%')
            ->first();

        if(empty($bayaran))
            $bayaran = '0.00';
        else
            $bayaran = $bayaran->jumlah;

        return $bayaran;
    }

    protected function getZonGaji($no_gaji) {

        $profile = Profile::where('no_gaji', $no_gaji)
            ->first();

        return $profile->zon_gaji_id;
    }

}
