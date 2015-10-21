<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Perkhidmatan;
use App\Profile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;

class PinjamanController extends Controller
{
    public function index()
    {
        $perkhidmatan = Perkhidmatan::lists('nama', 'id');

        return View('members.pinjaman.index', compact('perkhidmatan'));
    }

    public function proses()
    {
        $validation = Validator::make(Request::all(), [
            'no_anggota'        => 'required|numeric',
            'perkhidmatan_id'   => 'required|numeric',
            'jumlah'            => 'required|numeric'
        ]);

        if($validation->fails())
        {
            Session::flash('error', 'Sila isi ruang yang disediakan dengan format yang betul.');

            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }

        $profile = Profile::where('no_anggota', Request::get('no_anggota'))
            ->first();

        if(empty($profile))
        {
            Session::flash('error', 'No Anggota tidak dijumpai!');

            return Redirect::back()
                ->withInput();
        }

//        return Request::all();

        AkaunPotongan::create([
            'no_anggota'        => Request::get('no_anggota'),
            'perkhidmatan_id'   => Request::get('perkhidmatan_id'),
            'jumlah'            => Request::get('jumlah')
        ]);

        Session::flash('success', 'Berjaya. Proses Pinjaman telah direkodkan.');

        return Redirect::back();
    }
}
