<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Profile;
use App\Tangguh;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TangguhController extends Controller
{
    public function index() {
        return View('members.tangguh.index');
    }

    public function indexPost() {

        $accounts = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->get();

        if($accounts->isEmpty()) {
            Session::flash('error', 'Gagal. No gaji *' . Request::get('no_gaji') . '* tiada sebarang pinjaman');
            return Redirect::back();
        }

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        $nama = $profile->nama;
        $no_gaji = Request::get('no_gaji');

        return View('members.tangguh.form', compact('accounts', 'nama', 'no_gaji'));
    }

    public function proses() {

        $validation = Validator::make(Request::all(), [
            'no_gaji'           => 'required',
            'akaunpotongan_id'  => 'required|numeric',
            'dari'              => 'required',
            'sehingga'          => 'required'
        ]);

        if($validation->fails() || Request::get('dari') > Request::get('sehingga')) {
            Session::flash('error', 'Gagal. Sila masukkan data dengan betul.');
            return Redirect::back();
        }

        // Semak samada dah ada tangguh bulan yang sama


        $tangguh = new Tangguh;

        $tangguh->no_gaji           = Request::get('no_gaji');
        $tangguh->akaunpotongan_id  = Request::get('akaunpotongan_id');
        $tangguh->dari              = Request::get('dari');
        $tangguh->sehingga          = Request::get('sehingga');

        if($tangguh->save())
            Session::flash('success', 'Berjaya.');
        else
            Session::flash('error', 'Gagal.');

        return Redirect::back();
    }

}
