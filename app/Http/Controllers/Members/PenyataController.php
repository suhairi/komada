<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Potongan;
use Request;
use App\Http\Controllers\Controller;

class PenyataController extends Controller
{
    public function wangtunai($id)
    {

        $akaunPotongan = AkaunPotongan::findOrFail($id);

        $potongan = Potongan::where('no_gaji', $akaunPotongan->no_gaji)
            ->first();

        return View('members.penyata.wangtunai', compact('akaunPotongan', 'potongan'));
    }
}
