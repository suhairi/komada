<?php

namespace App\Http\Controllers\Members;

use App\Profile;
use Request;
use App\Http\Controllers\Controller;

class BukusekolahController extends Controller
{
    public function index()
    {
        return View('members.bukusekolah.index');
    }

    public function indexPost()
    {
//        return Request::all();

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();


        Return View('members.bukusekolah.form', compact('profile'));
    }
}
