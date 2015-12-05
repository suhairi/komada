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
use App\Yuran;

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
            $this->deactivated(Request::get('no_gaji'));
            $baki = '0.00';
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
            'bulanan'           => Request::get('byrn_bulanan'),
            'status'            => 1
        ]);

        // this is how to cater the potongan table!!
//
//        $potongan = Potongan::where('no_gaji', Request::get('no_gaji'))
//            ->first();
//
//        if(!empty($potongan))
//            $potongan->jumlah += Request::get('byrn_bulanan');
//        else{
//            $potongan = new Potongan;
//            $potongan->no_gaji = Request::get('no_gaji');
//            $potongan->jumlah  = Request::get('byrn_bulanan');
//        }
//
//        $potongan->save();

        Session::flash('success', 'Berjaya. Proses Pinjaman telah direkodkan.');

        return Redirect::back();
    }

    public function overlapProcess()
    {
        return Request::all();
        // Data Validation
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

        // verify check jumlah layak
        if(Request::get('jumlah') > $this->getJumlahLayak(Request::get('no_gaji')))
        {
            Session::flash('error', 'Gagal. Anda hanya layak meminjam sebanyak RM ' . $this->getJumlahLayak(Request::get('no_gaji')));
            return Redirect::back();
        }

        if($this->checkAccounts(Request::get('no_gaji')))
        {
            // deactivate AkaunPotongan here
            $this->deactivated(Request::get('no_gaji'));
            $baki = '0.00';
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
            'bulanan'           => Request::get('byrn_bulanan'),
            'status'            => 1
        ]);

        return Redirect::back();
    }




    // Helper Function
    // Check wether account exists in table AkaunPotongan
    protected function checkAccounts($no_gaji)
    {
        $accounts = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->where('perkhidmatan_id', 1)
            ->get();

        if($accounts->isEmpty())
            return false;
        else
            return true;
    }

    protected function getJumlahLayak($no_gaji)
    {
        $jumlah = Yuran::where('no_gaji', $no_gaji)
            ->sum('yuran');

        // missing => $jumlah = $jumlah + jumlah_caruman_lama

        if($jumlah < 10000)
            $layak = 2 * $jumlah;
        else
            $layak = 0.8 * $jumlah;

        return $layak;
    }

    protected function deactivated($no_gaji)
    {
        AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('status', 1)
            ->where('perkhidmatan_id', 1)
            ->update(['status' => 0, 'baki' => '0.00']);
    }





}
