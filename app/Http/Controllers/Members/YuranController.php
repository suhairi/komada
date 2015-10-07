<?php

namespace App\Http\Controllers\Members;

use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class YuranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y-m') . '%')
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

//        dd($count);

//        dd($yuranBulanans->toArray());
        return View('members.yuran', compact('yuranTambahans', 'yuranBulanans', 'count'));
    }
}
