<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Request;

class JadualController extends Controller
{
    public function carian()
    {
        return View('members.profile.jadual.carian');
    }

    public function result()
    {
        return Request::all();
    }
}
