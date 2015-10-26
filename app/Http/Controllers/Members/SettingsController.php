<?php

namespace App\Http\Controllers\Members;

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
}
