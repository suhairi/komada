<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function admin()
    {
        return View('todolist');
    }

    public function admin2()
    {
        return View('todolist2');
    }

    public function backup()
    {

    }
}
