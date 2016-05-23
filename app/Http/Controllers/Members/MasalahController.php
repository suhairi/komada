<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AkaunPotongan;
use App\Profile;

class MasalahController extends Controller
{
    public function masalah1() {
        $profiles = Profile::where('no_gaji', '')
            ->get();

        return View('members.masalah.masalah1', compact('profiles'));

   }
    public function masalah2() {

        $accounts = AkaunPotongan::where('bulanan', 0)
            ->where('status', 1)
            ->get();

        return View('members.masalah.masalah2', compact('accounts'));
    }

   


}
