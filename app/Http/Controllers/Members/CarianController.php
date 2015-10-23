<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use Carbon\Carbon;
use Request;
use Flatten\Facades\Flatten;

class CarianController extends Controller
{
    public function index()
    {
        return View('members.index..');
    }

    public function noAnggota()
    {

        $profiles = Profile::where('no_gaji', Request::get('no_gaji'))
            ->get();

        $yurans = Yuran::where('no_gaji', Request::get('no_gaji'))
            ->where('bulan_tahun', 'like', '%' . Carbon::now()->format('Y'))
            ->orderBy('bulan_tahun', 'asc')
            ->get();

        $yuranTambahan = [];

        for($i=1; $i<=12; $i++)
        {

            if($i < 10)
                $bulan = '0' . $i;
            else
                $bulan = $i;

            $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y-') . $bulan . '%')
                ->orderBy('created_at', 'asc')
                ->get();

            foreach($yuranTambahans as $tambahan)
                array_push($yuranTambahan, [
                    'bulan' => $bulan,
                    'nama' => $tambahan->nama,
                    'catatan' => $tambahan->sumbangan->nama,
                    'penerima' => $tambahan->penerima,
                    'jumlah' => $tambahan->jumlah
                ]);

            if($i == Carbon::now()->format('m') - 1)
                $i = 13;
        }

        $bil = 1;
        $biasas = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->get();

        return View('members.profile', compact('bil', 'profiles', 'yurans', 'yuranTambahan', 'biasas'));
    }
}
