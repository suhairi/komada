<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use Request;
use App\Http\Controllers\Controller;

class PenyataController extends Controller
{
    public function wangtunai($id)
    {

        $akaunPotongan = AkaunPotongan::findOrFail($id);

        $akaun = $akaunPotongan->toArray();

        return View('members.penyata.wangtunai', compact('akaun'));
    }
}