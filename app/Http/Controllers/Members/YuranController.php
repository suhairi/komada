<?php

namespace App\Http\Controllers\Members;

use App\Sumbangan;
use App\Tka;
use Illuminate\Support\Facades\Redirect;
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

    public function yuranTambahan()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $created_at = $tarikh[1] . '-' . $tarikh[0] . '-' . Carbon::now()->format('d') .' 00:00:00';

//        return Request::all();

        Yurantambahan::create([
            'jumlah'        => Request::get('jumlah'),
            'sumbangan_id'  => Request::get('sumbangan_id'),
            'no_gaji'       => Request::get('no_gaji'),
            'penerima'      => strtoupper(Request::get('penerima')),
            'created_at'    => $created_at
        ]);

        return redirect()->route('members.yuran');
    }

    public function yuranProcess()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $bulan_tahun = $tarikh[1] . '-' . $tarikh[0];
        $profiles = Profile::where('status', 1)
            ->where('tarikh_ahli', 'not like', Carbon::now()->format('Y-m') . '%')
            ->get();
        $yuranTambahan = Yurantambahan::where('created_at', 'like', $bulan_tahun . '%')
            ->get();

        foreach($profiles as $profile)
        {
            $yuran = Yuran::where('bulan_tahun', $bulan_tahun)
                ->where('no_gaji', $profile->no_gaji)
                ->first();

            $tka = Tka::where('status', 1)->first();

//            return $profile->zon_gaji_id;

            if(empty($yuran))
            {
                Yuran::create([
                    'no_gaji'       => $profile->no_gaji,
                    'bulan_tahun'   => Request::get('bulan_tahun'),
                    'yuran'         => $profile->jumlah_yuran_bulanan,
                    'pertaruhan'    => $profile->jumlah_pertaruhan,
                    'tka'           => $tka->jumlah,
                    'takaful'       => '10.00',
                    'zon_gaji_id'   => $profile->zon_gaji_id
                ]);
            }

        }

        return Redirect::route('members.yuran.index');
    }


}
