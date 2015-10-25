<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Request;

class LoginController extends Controller
{
   public function authenticate()
   {
       $validation = Validator::make(Request::all(), [
           'email'      => 'required|email',
           'password'   => 'required'
       ]);

       if($validation->fails()) {
           return Redirect('/')
               ->withInput()
               ->withErrors($validation);
       } else {
           if(Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')], 1))
           {
               return Redirect::intended('/');
           }
       }
   }

    public function logout()
    {
        Auth::logout();

        \Session::flush();

        return Redirect('/');
    }



}
