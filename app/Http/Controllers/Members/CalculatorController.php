<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use Request;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    public function pwt()
    {
        return View('members.calculator.pwt');
    }

    public function pwtPost()
    {

        $found = false;
        $akaun = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('status', 1)
            ->get();

        if(!$akaun->isEmpty())
            $found = true;

        return View('members.calculator.pwt_calculator', compact('akaun', 'found'));
    }
}
