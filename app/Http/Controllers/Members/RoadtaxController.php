<?php

namespace App\Http\Controllers\Members;

use Illuminate\Support\Facades\Session;
use Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Support\Facades\Redirect;

class RoadtaxController extends Controller
{
    public function index()
    {
        return View('members.roadtax.index');
    }

    public function indexPost()
    {
        $profiles = Profile::where('no_gaji', Request::get('no_gaji'))
            ->get();

        if($profiles->isEmpty())
        {
            Session::flash('error', 'Gagal. No Gaji * ' . Request::get('no_gaji') . ' * tidak berdaftar sebagai ahli KOMADA.');
            return Redirect::back()->withInput();
        }

        return Request::all();
    }

}
