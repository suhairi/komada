<?php

namespace App\Http\Controllers\Members;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PasswordController extends Controller
{
    public function password()
    {
        return View('members.password');
    }

    public function change()
    {

        if(\Hash::check(Request::get('current'), Auth::user()->getAuthPassword()))
        {
            $validation = Validator::make(Request::all(), [
                'current'               => 'required',
                'password'              => 'required|min:4',
                'password_confirmation' => 'required|same:password'
            ]);

            if($validation->fails())
                Session::flash('error', 'Gagal. Tukar Kata Laluan');
            else {
                $user = User::find(Auth::user()->id);

                $user->password = \Hash::make(Request::get('password'));

                if($user->save())
                    Session::flash('success', 'Berjaya. Tukar Kata Laluan');
            }

        }

        return Redirect::back();
    }

}
