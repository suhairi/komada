<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use Request;
use App\Http\Controllers\Controller;

class PenyataController extends Controller
{
    public function potongan($id)
    {

        $akaunPotongan = AkaunPotongan::findOrFail($id);

        $akaun = $akaunPotongan->toArray();

        return View('members.penyata.potongan', compact('akaun'));
    }
}
