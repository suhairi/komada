<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $profiles = null;
        return View('members.index');
    }

    public function addUser()
    {
        return View('members.addUser');
    }
}
