<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KadahliController extends Controller
{
    public function kadahli()
    {
        return View('members.kadahli');
    }
}
