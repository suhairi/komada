<?php

namespace App\Http\Controllers\Members;

use App\Potongan;
use App\Sumbangan;
use App\Tka;
use App\Takaful;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Request;

use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class YuranController extends Controller
{
    public function index()
    {

        $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y') . '%')
            ->orderBy('created_at', 'asc')
            ->get();

        $yuranBulanans = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->get();

        $sumbangan = Sumbangan::lists('nama', 'id');

        $totalAnggota = Profile::all()->count();
        $totalAnggotaAktif = Profile::where('status', 1)->count();
        $totalAnggotaXAktif = Profile::where('status', 0)->count();
        $totalAnggotaBaru = Profile::where('status', 1)->where('tarikh_ahli', 'like', Carbon::now()->format('Y-m') . '%')->count();
        $totalYuran = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->count();

        $count = [
            'totalAnggota' => $totalAnggota,
            'totalAnggotaAktif' => $totalAnggotaAktif,
            'totalAnggotaXAktif'=> $totalAnggotaXAktif,
            'totalAnggotaBaru'  => $totalAnggotaBaru,
            'totalYuran' => $totalYuran
        ];

        $totalTambahan = 0.00;

        return View('members.yuran', compact('yuranTambahans', 'yuranBulanans', 'count', 'totalTambahan', 'sumbangan'));
    }

    // Merekod Yuran Tambahan
    public function yuranTambahan()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $created_at = $tarikh[1] . '-' . $tarikh[0] . '-' . Carbon::now()->format('d') .' 00:00:00';

//        return Request::all();

        Yurantambahan::create([
            'jumlah'        => Request::get('jumlah'),
            'sumbangan_id'  => Request::get('sumbangan_id'),
            'no_gaji'       => Request::get('no_gaji'),
            'tarikh'        => Request::get('tarikh'),
            'penerima'      => strtoupper(Request::get('penerima')),
            'created_at'    => $created_at
        ]);

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))->first();
        $profile->status = 0;
        $profile->save();

        Session::flash('success', 'Berjaya. Yuran Tambahan berjaya didaftarkan dan Anggota telah di nyah-aktifkan.');

        return redirect()->route('members.yuran.index');
    }

    public function yuranProcess()
    {

        $profiles = Profile::where('status', 1)
            ->where('tarikh_ahli', 'not like', Carbon::now()->format('Y-m') . '%')
            ->get();

        foreach($profiles as $profile)
        {
            $jumlahPotongan = '0.00';
            $tka = Tka::where('status', 1)->first();
            $takaful = Takaful::where('status', 1)->first();
            $potongan = Potongan::where('no_gaji', $profile->no_gaji)->first();

            if(!empty($potongan))
                $jumlahPotongan = (float)number_format($potongan->jumlah, 2);


            if(!$this->checkPotongan($profile->no_gaji))
            {
                Yuran::create([
                    'no_gaji'       => $profile->no_gaji,
                    'bulan_tahun'   => Request::get('bulan_tahun'),
                    'yuran'         => number_format($profile->jumlah_yuran_bulanan, 2),
                    'pertaruhan'    => number_format($profile->jumlah_pertaruhan, 2),
                    'tka'           => number_format($tka->jumlah, 2),
                    'takaful'       => number_format($takaful->jumlah, 2),
                    'potongan'      => number_format($jumlahPotongan, 2),
                    'zon_gaji_id'   => $profile->zon_gaji_id
                ]);
            }

        }

        return Redirect::route('members.yuran.index');
    }

    // Check Potongan Bulan semasa telah dibuat atau belum
    protected function checkPotongan($no_gaji)
    {
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');

        if($bulan < 10)
            $bulan = '0' . $bulan;

        $yuran = Yuran::where('bulan_tahun', $bulan . '-' . $tahun)
            ->where('no_gaji', $no_gaji)
            ->get();

        if($yuran->isEmpty())
            return false;
        else
            return true;
    }

}
