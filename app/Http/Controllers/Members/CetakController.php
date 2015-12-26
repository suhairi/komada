<?php

namespace App\Http\Controllers\Members;

use App\Profile;
use App\Zon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Yuran;
use App\Yurantambahan;
use App\AkaunPotongan;

class CetakController extends Controller
{

    public function lapGajiIndividu($zon, $bulan, $tahun) {

        $bulan_tahun = $bulan . '-' . $tahun;

        $bahagian = Zon::where('kod', $zon)
            ->first();

        $profiles = Profile::where('zon_gaji_id', $zon)
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



        return View('members.laporan.cetak.lapGajiIndividu', compact('bil', 'bahagian', 'persons', 'jumlahBesar', 'bulan', 'tahun'));
    }

    /*
     * Helper Functions
     */

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
        $bayaran = [];

        $yuran = Yuran::where('no_gaji', $no_gaji)
            ->where('created_at', 'like', $tarikh . '%')
            ->first();

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
