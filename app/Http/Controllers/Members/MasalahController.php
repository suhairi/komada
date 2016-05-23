<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AkaunPotongan;

class MasalahController extends Controller
{
   public function masalah1() {

        $accounts = AkaunPotongan::where('bulanan', 0)
            ->get();

        return View('members.masalah.masalah1', compact('accounts'));
   }


}
