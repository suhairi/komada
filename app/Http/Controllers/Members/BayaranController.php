<?php

namespace App\Http\Controllers\Members;

use App\AkaunPotongan;
use App\Bayaran;
use App\Perkhidmatan;
use App\Profile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;

class BayaranController extends Controller
{
    public function index() {
        return View('members.bayaran.index');
    }

    public function indexPost() {

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->get();

        if( $profile->isEmpty()) {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tidak berdafatar dengan KOMADA');
            return Redirect::back();
        }

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        $akauns = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('status', 1)
            ->get();

        if($akauns->isEmpty()) {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tiada rekod pinjaman');
            return Redirect::back();
        }

        $accounts = [];

        foreach($akauns as $akaun) {

            $perkhidmatan = Perkhidmatan::where('id', $akaun->perkhidmatan_id)
                ->first();

            array_push($accounts, ['id' => $akaun->perkhidmatan_id, 'nama' => $perkhidmatan->nama, 'baki' => $akaun->baki]);
        }

        return View('members.bayaran.form', compact('profile', 'accounts'));
    }

    public function proses() {

        $validation = Validator::make(Request::all(), [
            'akaunpotongan_id'     => 'required',
            'jumlah_bayaran'        => 'required',
            'no_gaji'               => 'required'
        ]);

        if($validation->fails()) {
            Session::flash('error', 'Gagal. Sila isikan ruangan yang disediakan dengan format yang betul');
            return Redirect::back();
        }

        $akaun = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('perkhidmatan_id', Request::get('akaunpotongan_id'))
            ->where('status', 1)
            ->where('baki', '>=', Request::get('jumlah_bayaran'))
            ->first();

        if(empty($akaun)) {
            Session::flash('error', 'Gagal. Bayaran melebihi baki pinjaman.');
            return Redirect::back();
        }

        $akaun->baki = $akaun->baki - Request::get('jumlah_bayaran');

        $tunai = Bayaran::create([
            'no_gaji'           => Request::get('no_gaji'),
            'akaunpotongan_id'  => Request::get('akaunpotongan_id'),
            'jumlah'            => Request::get('jumlah_bayaran')
        ]);

        if($akaun->save()) {
            Session::flash('success', 'Berjaya. Bayaran Tunai telah berjaya.');
        }

        return Redirect::back();
    }

    public function langsai() {
        return View('members.bayaran.langsai');
    }

    public function langsaiPost() {

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->get();

        if( $profile->isEmpty()) {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tidak berdafatar dengan KOMADA');
            return Redirect::back();
        }

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))
            ->first();

        $akauns = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('status', 1)
            ->get();

        if($akauns->isEmpty()) {
            Session::flash('error', 'Gagal. No Gaji *' . Request::get('no_gaji') . '* tiada rekod pinjaman/tertunggak');
            return Redirect::back();
        }

        $accounts = [];

        foreach($akauns as $akaun) {

            $perkhidmatan = Perkhidmatan::where('id', $akaun->perkhidmatan_id)
                ->first();

            array_push($accounts, ['id' => $akaun->perkhidmatan_id, 'nama' => $perkhidmatan->nama, 'baki' => $akaun->baki]);
        }

        return View('members.bayaran.langsaiPost', compact('profile', 'accounts'));

    }

    public function langsaiProses() {
        $validation = Validator::make(Request::all(), [
            'akaunpotongan_id'     => 'required',
            'jumlah_bayaran'        => 'required',
            'no_gaji'               => 'required'
        ]);

        if($validation->fails()) {
            Session::flash('error', 'Gagal. Sila isikan ruangan yang disediakan dengan format yang betul');
            return Redirect::back();
        }

        $akaun = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->where('perkhidmatan_id', Request::get('akaunpotongan_id'))
            ->where('status', 1)
            ->where('baki', '>=', Request::get('jumlah_bayaran'))
            ->first();

        if(empty($akaun)) {
            Session::flash('error', 'Gagal. Bayaran melebihi baki pinjaman.');
            return Redirect::back();
        }

        $akaun->baki = $akaun->baki - Request::get('jumlah_bayaran');
        $akaun->status = 0;

        $tunai = Bayaran::create([
            'no_gaji'           => Request::get('no_gaji'),
            'akaunpotongan_id'  => Request::get('akaunpotongan_id'),
            'jumlah'            => Request::get('jumlah_bayaran')
        ]);

        if($akaun->save()) {
            Session::flash('success', 'Berjaya. Bayaran Langsai telah berjaya.');
        }

        return Redirect::back();
    }


}
