<?php

namespace App\Http\Controllers\Members;

use App\Profile;
use Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $profile = Profile::where('no_anggota', $id)
            ->first();

        return View('members.profile.edit', compact('profile'));
    }

    public function update($id)
    {
        return Request::all();
    }
}
