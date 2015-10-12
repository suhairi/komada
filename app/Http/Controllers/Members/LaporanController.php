<?php

namespace App\Http\Controllers\Members;

use App\Profile;
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


}
