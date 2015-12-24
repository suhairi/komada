<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $accounts = AkaunPotongan::where('status', 1)
            ->get();

        $profiles = [];

        if($accounts->isEmpty())
            return View('members.index', compact('profiles'));

        foreach($accounts as $account) {

            if($account->baki <= ($account->bulanan * 3)) {

                $profile = Profile::where('no_gaji', $account->no_gaji)
                    ->first();

                array_push($profiles, ['nama' => $profile->nama, 'no_gaji' => $account->no_gaji, 'baki' => $account->baki, 'bulanan' => $account->bulanan]);
            }

        }

        return View('members.index', compact('profiles'));
    }


}
