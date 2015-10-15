<?php

namespace App\Http\Controllers\Members;

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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y') . '%')
            ->orderBy('created_at', 'asc')
            ->get();

//        dd($yuranTambahans);

        $yuranBulanans = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->get();

        $totalAnggota = Profile::all()->count();
        $totalAnggotaAktif = Profile::where('status', 1)->count();
        $totalYuran = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->count();

        $count = [
            'totalAnggota' => $totalAnggota,
            'totalAnggotaAktif' => $totalAnggotaAktif,
            'totalYuran' => $totalYuran
        ];

        $totalTambahan = 0.00;

        return View('members.yuran', compact('yuranTambahans', 'yuranBulanans', 'count', 'totalTambahan'));
    }

    public function yuranTambahan()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $created_at = $tarikh[1] . '-' . $tarikh[0] . '-01 00:00:00';

        Yurantambahan::create([
            'nama'          => strtoupper(Request::get('nama')),
            'jumlah'        => Request::get('jumlah'),
            'catatan'       => strtoupper(Request::get('catatan')),
            'created_at'    => $created_at
        ]);

        return redirect()->route('members.yuran');
    }

    public function yuranProcess()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $bulan_tahun = $tarikh[1] . '-' . $tarikh[0];
        $profiles = Profile::where('status', 1)->get();
        $yuranTambahan = Yurantambahan::where('created_at', 'like', $bulan_tahun . '%')
            ->get();

        foreach($profiles as $profile)
        {
            $yuran = Yuran::where('bulan_tahun', $bulan_tahun)
                ->where('no_anggota', $profile->no_anggota)
                ->first();

            $tka = Tka::where('status', 1)->first();

            if(empty($yuran))
            {
                Yuran::create([
                    'no_anggota'        => $profile->no_anggota,
                    'bulan_tahun'       => Request::get('bulan_tahun'),
                    'jumlah'            => $profile->jumlah_yuran_bulanan,
                    'tka'               => $tka->jumlah
                ]);
            }

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
