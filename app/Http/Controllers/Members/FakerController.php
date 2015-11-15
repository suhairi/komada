<?php

namespace App\Http\Controllers\Members;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FakerController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        foreach($profiles as $profile)
        {
            $no_anggota = (int)$profile->no_anggota;

            if($no_anggota != 0)
            {

            }
        }


    }
}
