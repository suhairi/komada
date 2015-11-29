<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Perkhidmatan;
use App\Potongan;
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
            'no_gaji'           => 'required|numeric',
            'jumlah'            => 'required|numeric',
            'tempoh'            => 'required|numeric',
            'kadar'             => 'required|numeric',
            'kadar_bulanan'     => 'required|numeric',
            'caj_perkhidmatan' => 'required|numeric',
            'insurans'          => 'required|numeric',
            'byrn_bulanan'      => 'required|numeric',
            'jumlah_keseluruhan'=> 'required|numeric'
        ]);

        if($validation->fails())
        {
            Session::flash('error', 'Sila isi ruang yang disediakan dengan format yang betul.');

            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        if(empty($profile))
        {
            Session::flash('error', 'No Anggota tidak dijumpai!');

            return Redirect::back()
                ->withInput();
        }

        if($this->checkAccounts(Request::get('no_gaji')))
        {
            // deactivate AkaunPotongan here
            $baki = '100.00';
        }else
            $baki = Request::get('jumlah_keseluruhan');

        AkaunPotongan::create([
            'no_gaji'           => Request::get('no_gaji'),
            'perkhidmatan_id'   => 1,
            'jumlah'            => Request::get('jumlah'),
            'tempoh'            => Request::get('tempoh'),
            'kadar'             => (float)Request::get('kadar'),
            'caj_perkhidmatan'  => Request::get('caj_perkhidmatan'),
            'insurans'          => Request::get('insurans'),
            'jumlah_keseluruhan'=> Request::get('jumlah_keseluruhan'),
            'baki'              => $baki,
            'status'            => 1
        ]);

        Potongan::create([
            'no_gaji'   => Request::get('no_gaji'),
            'jumlah'    => Request::get('byrn_bulanan')
        ]);

        Session::flash('success', 'Berjaya. Proses Pinjaman telah direkodkan.');

        return Redirect::back();
    }

    protected function checkAccounts($noGaji)
    {
        $accounts = AkaunPotongan::where('no_gaji', $noGaji)
            ->get();

        if($accounts->isEmpty())
            return false;
        else
            return true;
    }
}
