<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Potongan;
use App\Profile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;

class BukusekolahController extends Controller
{
    public function index()
    {
        return View('members.bukusekolah.index');
    }

    public function indexPost()
    {
//        return Request::all();

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        // 1. check for outstanding payment for buku sekolah
        // 2.

        Return View('members.bukusekolah.form', compact('profile'));
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

        // 1. add up in table potongan
        // 2. add up in table akaunpotongan
        // 3.

        $potongan = Potongan::where('no_gaji', Request::get('no_gaji'))
            ->first();

        if(!empty($potongan))
            $potongan->jumlah += Request::get('bulanan');
        else{
            $potongan = new Potongan;
            $potongan->no_gaji = Request::get('no_gaji');
            $potongan->jumlah  = Request::get('bulanan');
        }


        if($potongan->save())
        {
            $akaunPotongan = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
                ->where('perkhidmatan_id', 2)
                ->where('status', 1)
                ->first();

            if(empty($akaunPotongan))
            {
                AkaunPotongan::create([
                    'no_gaji'               => Request::get('no_gaji'),
                    'perkhidmatan_id'       => '2',
                    'jumlah'                => Request::get('jumlah'),
                    'tempoh'                => Request::get('tempoh'),
                    'kadar'                 => Request::get('kadar'),
                    'caj_perkhidmatan'      => '0.00',
                    'insurans'              => '0.00',
                    'jumlah_keseluruhan'    => Request::get('jumlah_keseluruhan'),
                    'baki'                  => Request::get('jumlah_keseluruhan'),
                    'status'                => 1
                ]);
            }
        }

        Session::flash('success', 'Berjaya. Pinjaman Buku Sekolah berjaya direkodkan');

        return Redirect::back();


    }

}
