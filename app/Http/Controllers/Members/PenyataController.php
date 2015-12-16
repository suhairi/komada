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
        return View('members.penyata.wangtunai');
    }
}
