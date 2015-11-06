<?php

namespace App\Http\Controllers\Members;

use Request;
use App\Http\Controllers\Controller;

class PertaruhanController extends Controller
{
    public function index()
    {
        return View('members.pertaruhan');
    }

    public function indexPost()
    {
        return Request::all();
    }
}
