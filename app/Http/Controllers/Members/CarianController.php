<?php

namespace App\Http\Controllers\Members;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use Request;

class CarianController extends Controller
{

//    public function index()
//    {
//        return View('members.index', compact('profiles'));
//    }

    public function noAnggota()
    {
        $profiles = Profile::where('no_anggota', Request::get('no_anggota'))
            ->get();

        return View('members.carian', compact('profiles'));
    }
}
