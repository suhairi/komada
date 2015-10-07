<?php

namespace App\Http\Controllers\Members;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Yuran;
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

        return View('members.carian', compact('profiles', 'yurans'));
    }
}
