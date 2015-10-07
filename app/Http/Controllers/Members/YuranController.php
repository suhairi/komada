<?php

namespace App\Http\Controllers\Members;

use Request;

use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class YuranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y') . '%')
            ->orderBy('created_at', 'asc')
            ->get();

        $yuranBulanans = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->first();

        $totalAnggota = Profile::all()->count();
        $totalAnggotaAktif = Profile::where('status', 1)->count();
        $totalYuran = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->count();

        $count = [
            'totalAnggota' => $totalAnggota,
            'totalAnggotaAktif' => $totalAnggotaAktif,
            'totalYuran' => $totalYuran
        ];

        return View('members.yuran', compact('yuranTambahans', 'yuranBulanans', 'count'));
    }

    public function yuranProcess()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $bulan_tahun = $tarikh[1] . '-' . $tarikh[0];
        $profiles = Profile::where('status', 1)->get();
        $yuranTambahan = Yurantambahan::where('created_at', 'like', $bulan_tahun . '%')
            ->first();

//        dd($yuranTambahan->id);

        foreach($profiles as $profile)
        {
            Yuran::create([
                'no_anggota'        => $profile->no_anggota,
                'bulan_tahun'       => Request::get('bulan_tahun'),
                'jumlah'            => $profile->jumlah_yuran_bulanan,
                'yuran_tambahan_id' => $yuranTambahan->id
            ]);
        }

        $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y') . '%')
            ->orderBy('created_at', 'asc')
            ->get();

        $yuranBulanans = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->first();

        $totalAnggota = Profile::all()->count();
        $totalAnggotaAktif = Profile::where('status', 1)->count();
        $totalYuran = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->count();

        $count = [
            'totalAnggota' => $totalAnggota,
            'totalAnggotaAktif' => $totalAnggotaAktif,
            'totalYuran' => $totalYuran
        ];

        return View('members.yuran', compact('yuranTambahans', 'yuranBulanans', 'count'));
    }
}
