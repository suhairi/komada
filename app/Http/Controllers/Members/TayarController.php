<?php

namespace App\Http\Controllers\Members;

use Request;
use App\AkaunPotongan;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TayarController extends Controller
{
    public function index()
    {
        return View('members.tayar.index');
    }

    public function indexPost()
    {

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        if (empty($profile)) {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tidak didaftarkan sebagai anggota KOMADA.');
            return Redirect::back()->withInput();
        }

        // 1. check for outstanding payment for buku sekolah
        // 2.

        Return View('members.tayar.form', compact('profile'));
    }

    public function proses()
    {
        $validation = Validator::make(Request::all(), [
            'no_gaji'   => 'required|numeric',
            'nama'      => 'required',
            'jumlah'    => 'required|numeric',
            'tempoh'    => 'required|numeric',
            'kadar'     => 'required|numeric',
            'bulanan'   => 'required|numeric'
        ]);

        if($validation->fails())
        {
            Session::flash('error', 'Gagal. Sila isikan semua ruangan dengan format yang betul.');
            return Redirect::back();
        }

        // 1. add up in table akaunpotongan
        // 2.

        $akaunPotongan = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('perkhidmatan_id', 5)
            ->where('status', 1)
            ->first();

        if(empty($akaunPotongan))
        {
            AkaunPotongan::create([
                'no_gaji'               => Request::get('no_gaji'),
                'perkhidmatan_id'       => '5',
                'jumlah'                => Request::get('jumlah'),
                'tempoh'                => Request::get('tempoh'),
                'kadar'                 => Request::get('kadar'),
                'caj_perkhidmatan'      => '0.00',
                'insurans'              => '0.00',
                'jumlah_keseluruhan'    => Request::get('jumlah_keseluruhan'),
                'baki'                  => Request::get('jumlah_keseluruhan'),
                'bulanan'               => Request::get('bulanan'),
                'status'                => 1
            ]);
        } else {
            // this is for overlapping kecemasan
            // 1. deactivate current active accountpotongan
            // 2. and then create a new one with new bulanan payment

        }

        Session::flash('success', 'Berjaya. Pinjaman Tayar / Bateri berjaya direkodkan');

        return Redirect::back();
    }

}
