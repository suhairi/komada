<?php

namespace App\Http\Controllers\Members\Laporan;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class YuranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return View('members.laporan.yuran');
    }
}
