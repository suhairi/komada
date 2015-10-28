<?php

namespace App\Http\Controllers\Members;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Tka;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function tka()
    {
        $tka = Tka::where('status', 1)
            ->first();

        return View('members.settings.tka', compact('tka'));
    }

    public function tkaPost()
    {
        $tka = Tka::where('jumlah', Request::get('jumlah'))
            ->where('status', 1)
            ->get();

        if(!$tka->isEmpty())
        {
            Session::flash('error', 'Gagal. Jumlah yang sama dengan Jumlah TKA semasa .');
            return Redirect::back()->withInput();
        }


        $validation = Validator::make(Request::all(), [
            'jumlah'    => 'required|numeric'
        ]);

        if($validation->fails())
        {
            Session::flash('error', 'Gagal. Masukkan nilai jumlah dengan format yang betul.');
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $tka = new Tka();

        $tka->jumlah = Request::get('jumlah');
        $tka->status = 1;

        if($tka->save())
        {
            $tka = Tka::where('jumlah', '!=', Request::get('jumlah'))-> update(['status' => 0]);

            Session::flash('success', 'Berjaya. Nilai baru bagi TKA telah disimpan.');
            Return Redirect::route('members.settings.tka');
        }else {
            Session::flash('error', 'Gagal. Masukkan nilai jumlah dengan format yang betul.');
            return Redirect::back()->withInput();
        }

    }

    public function pengguna()
    {
        $bil = 1;
        $users = User::all();

        return View('members.pengguna', compact('bil', 'users'));
    }

    public function penggunaPost()
    {
        $user = new User();

        $user->name = Request::get('name');
        $user->email = Request::get('email');
        $user->password = Hash::make(Request::get('password'));

        if($user->save())
        {
            Session::flash('success', 'Berjaya. Pengguna *' . Request::get('name') . '* berjaya didaftarkan.');
            return Redirect::route('members.settings.pengguna');
        }else {
            Session::flash('fail', 'Gagal. Pengguna *' . Request::get('name') . '* gagal didaftarkan.');
            return Redirect::back()->withInput();
        }


        return Request::all();
    }

    public function penggunaDelete($id)
    {

        $user = User::find($id);

        if($user->delete())
        {
            Session::flash('success', 'Berjaya. Pengguna *' . $user->name . '* berjaya dihapus.');
            return Redirect::route('members.settings.pengguna');
        }else {
            Session::flash('fail', 'Gagal. Pengguna *' . $user->name . '* gagal dihapus.');
            return Redirect::back();
        }
        return $id;
    }


}
