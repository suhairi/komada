<?php

namespace App\Http\Controllers\Members;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use Carbon\Carbon;
use Request;

class CarianController extends Controller
{

    public function noAnggota()
    {
        $profiles = Profile::where('no_anggota', Request::get('no_anggota'))
            ->get();

        $yurans = Yuran::where('no_anggota', Request::get('no_anggota'))
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
                    'catatan' => $tambahan->catatan,
                    'jumlah' => $tambahan->jumlah
                ]);
        }

        return View('members.carian', compact('profiles', 'yurans', 'yuranTambahan'));
    }
}
