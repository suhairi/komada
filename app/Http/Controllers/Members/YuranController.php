<?php
namespace App\Http\Controllers\Members;
use App\AkaunPotongan;
use App\Bayaran;
use App\Potongan;
use App\Sumbangan;
use App\Tangguh;
use App\Tka;
use App\Takaful;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Request;
use App\Profile;
use App\Yuran;
use App\Yurantambahan;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class YuranController extends Controller
{
    public function index()
    {
        $yuranTambahans = Yurantambahan::where('created_at', 'like', Carbon::now()->format('Y') . '%')
            ->orderBy('created_at', 'asc')
            ->get();
        $yuranBulanans = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->get();
        $sumbangan = Sumbangan::lists('nama', 'id');
        $totalAnggota = Profile::all()->count();
        $totalAnggotaAktif = Profile::where('status', 1)->count();
        $totalAnggotaXAktif = Profile::where('status', 0)->count();
        $totalAnggotaBaru = Profile::where('status', 1)->where('tarikh_ahli', 'like', Carbon::now()->format('Y-m') . '%')->count();
        $totalYuran = Yuran::where('bulan_tahun', 'like', Carbon::now()->format('m-Y') . '%')
            ->count();

        $count = [
            'totalAnggota' => $totalAnggota,
            'totalAnggotaAktif' => $totalAnggotaAktif,
            'totalAnggotaXAktif'=> $totalAnggotaXAktif,
            'totalAnggotaBaru'  => $totalAnggotaBaru,
            'totalYuran' => $totalYuran
        ];

        $totalTambahan = 0.00;

        return View('members.yuran', compact('yuranTambahans', 'yuranBulanans', 'count', 'totalTambahan', 'sumbangan'));
    }
    // Merekod Yuran Tambahan
    public function yuranTambahan()
    {
        $tarikh = explode('-', Request::get('bulan_tahun'));
        $created_at = $tarikh[1] . '-' . $tarikh[0] . '-' . Carbon::now()->format('d') .' 00:00:00';
//        return Request::all();
        Yurantambahan::create([
            'jumlah'        => Request::get('jumlah'),
            'sumbangan_id'  => Request::get('sumbangan_id'),
            'no_gaji'       => Request::get('no_gaji'),
            'tarikh'        => Request::get('tarikh'),
            'penerima'      => strtoupper(Request::get('penerima')),
            'created_at'    => $created_at
        ]);

        $profile = Profile::where('no_gaji', Request::get('no_gaji'))->first();
        $profile->status = 0;
        $profile->save();

        $accounts = AkaunPotongan::where('no_gaji', Request::get('no_gaji'))
            ->get();

        if(!$accounts->isEmpty()){

            foreach($accounts as $account) {
                $account->status = 0;
                $account->save();
            }

        }

        Session::flash('success', 'Berjaya. Yuran Tambahan berjaya didaftarkan dan Anggota telah di nyah-aktifkan.');

        return redirect()->route('members.yuran.index');
    }

    public function yuranProcess()
    {

        // Session::flash('error', 'Sistem dalam Pengemaskinian. Proses Yuran tergendala. Harap Maaf.');
        // return Redirect::back();
        // check for repeated payment for the selected month
        $doneMonth = Yuran::where('bulan_tahun', Request::get('bulan_tahun'))
            ->first();

        if(!empty($doneMonth))
        {
            Session::flash('error', 'Gagal. Bulan yang dipilih telah dibuat potongan.');
            return Redirect::back();
        }

        $profiles = Profile::where('status', 1)
            ->where('zon_gaji_id', '!=', 20)
            ->where('tarikh_ahli', 'not like', Carbon::now()->format('Y-m') . '%')
            ->get();

        foreach($profiles as $profile)
        {
            $jumlahPotongan = '0.00';
            $tka = Tka::where('status', 1)->first();
            $takaful = Takaful::where('status', 1)->first();

            $dates = explode('-', Request::get('bulan_tahun'));
            $tarikh = $dates[1] . '-' . $dates[0] . '01 00:00:00';

            $potongan = AkaunPotongan::where('no_gaji', $profile->no_gaji)
                ->where('status', 1)
                ->first();

            
            // check bayaran yuran sudah dibuat atau belum
            // jika belum proses bayaran
            // jika sudah, skip proses bayaran
            if(!$this->checkPotongan($profile->no_gaji))
            {

                $yuran = $profile->jumlah_yuran_bulanan;
                $pertaruhan = $profile->jumlah_pertaruhan;
                $tka = Tka::where('status', 1)->first()->jumlah;
                $takaful = Takaful::where('status', 1)-> first()->jumlah;

                // kod = 1
                $pwt = $this->getJumlah($profile->no_gaji, 1, 'bulanan'); 
                $pwtcp = $this->getJumlah($profile->no_gaji, 1, 'caj_proses'); 
                $pwtins = $this->getJumlah($profile->no_gaji, 1, 'insurans'); 

                // Kod = 2
                $bs = $this->getJumlah($profile->no_gaji, 2, 'bulanan'); 

                // Kod = 3;
                $rt = $this->getJumlah($profile->no_gaji, 3, 'bulanan');

                // Kod = 5
                $tb = $this->getJumlah($profile->no_gaji, 5, 'bulanan'); 
                $tbcp = $this->getJumlah($profile->no_gaji, 5, 'caj_proses'); 
                $tbins = $this->getJumlah($profile->no_gaji, 5, 'insurans'); 

                // kod = 6                
                $kc = $this->getJumlah($profile->no_gaji, 6, 'bulanan'); 
                $kccp = $this->getJumlah($profile->no_gaji, 6, 'caj_proses'); 
                $kcins = $this->getJumlah($profile->no_gaji, 6, 'insurans'); 

                // if($profile->no_gaji == 3374)
                //     return $pwt;         

                Yuran::create([
                    'no_gaji'       => $profile->no_gaji,
                    'bulan_tahun'   => Request::get('bulan_tahun'),
                    'yuran'         => $yuran,
                    'pertaruhan'    => $pertaruhan,
                    'tka'           => $tka,
                    'takaful'       => $takaful,
                    'pwt'           => $pwt,
                    'pwtcp'         => $pwtcp,
                    'pwtins'        => $pwtins,
                    'bs'            => $bs,
                    'rt'            => $rt,
                    'tb'            => $tb,
                    'tbcp'          => $tbcp,
                    'tbins'         => $tbins,
                    'kc'            => $kc,
                    'kccp'          => $kccp,
                    'kcins'         => $kcins,
                    'zon_gaji_id'   => $profile->zon_gaji_id
                ]);

            }
        }

        return Redirect::route('members.yuran.index');
    }

    public function batal($bulan, $tahun) {

        $yurans = Yuran::where('bulan_tahun', $bulan . '-' . $tahun)
            ->get();

        foreach($yurans as $yuran) {

            // Kod = 1
            $akaunPotongan = AkaunPotongan::where('no_gaji', $yuran->no_gaji)->where('perkhidmatan_id', 1)->first();
            if($akaunPotongan != null) {
                $akaunPotongan->baki += $yuran->pwt;
                $akaunPotongan->baki += $yuran->pwtcp;
                $akaunPotongan->baki += $yuran->pwtins;
            }

            // Kod = 2
            $bs = AkaunPotongan::where('no_gaji', $yuran->no_gaji)->where('perkhidmatan_id', 2)->first();
            if($akaunPotongan != null) {
                $akaunPotongan->baki += $yuran->bs;
            }

            // Kod = 3
            $rt = AkaunPotongan::where('no_gaji', $yuran->no_gaji)->where('perkhidmatan_id', 3)->first();
            if($akaunPotongan != null) {
                $akaunPotongan->baki += $yuran->rt;
                $akaunPotongan->save();
            }

            // Kod = 5
            $tb = AkaunPotongan::where('no_gaji', $yuran->no_gaji)->where('perkhidmatan_id', 5)->first();
            if($akaunPotongan != null) {
                $akaunPotongan->baki += $yuran->tb;
                $akaunPotongan->baki += $yuran->tbcp;
                $akaunPotongan->baki += $yuran->tbins;
                $akaunPotongan->save();
            }

            // Kod = 6
            $kc = AkaunPotongan::where('no_gaji', $yuran->no_gaji)->where('perkhidmatan_id', 6)->first();
            if($akaunPotongan != null) {
                $akaunPotongan->baki += $yuran->kc;
                $akaunPotongan->baki += $yuran->kccp;
                $akaunPotongan->baki += $yuran->kcins;
                $akaunPotongan->save();
            }

            $yuran->delete();
        }

        Session::flash('success', 'Berjaya. Yuran ' . $bulan . '/' .  $tahun . ' telah dibatalkan.');
        return Redirect::back();
    }



    // #################################### HELPER FUNCTIONS ################################################


    public function getJumlah($no_gaji, $kod, $perkara) {


        $bulanan = AkaunPotongan::where('no_gaji', $no_gaji)
            ->where('perkhidmatan_id', $kod)
            ->first();

        if($bulanan == null) {

            $total = 0.00;

        } else {

            $total = $bulanan->$perkara;

            if($perkara != 'bulanan') {
                
                $tarikh = explode('-', Request::get('bulan_tahun'));
                $tarikh = $tarikh[1] . '-' . $tarikh[0];

                $updated_at = substr($bulanan->updated_at, 0, 7);

                if($tarikh != $updated_at)
                    $total = 0.00;

            }

            //check if perkhidmatan_id isTangguh
            if($perkara == 'bulanan' && $this->isTangguh($no_gaji, $bulanan->id))
                $total = 0.00;

            // echo $total; exit;
            $bulanan->baki = $bulanan->baki - $total;
            $bulanan->save();
        }

        return $total;
    }


    // Check Potongan Bulan semasa telah dibuat atau belum
    protected function checkPotongan($no_gaji) {

        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');
        if($bulan < 10)
            $bulan = '0' . $bulan;

        $yuran = Yuran::where('bulan_tahun', $bulan . '-' . $tahun)
            ->where('no_gaji', $no_gaji)
            ->get();

        if($yuran->isEmpty())
            return false;
        else
            return true;
    }

    protected function isTangguh($no_gaji, $akaunPotongan_id) {

        $tarikh = explode('-', Request::get('bulan_tahun'));

        $bulan = $tarikh[0];
        $tahun = $tarikh[1];

        $date = $tahun . '-' . $bulan . '-01 00:00:00';

        $tangguh = Tangguh::where('no_gaji', $no_gaji)
            ->where('akaunPotongan_id', $akaunPotongan_id)
            ->where('dari', '>=', $date)
            ->where('sehingga', '<=', $date)
            ->get();

        if($tangguh->isEmpty())
            return false;
        else
            return true;

    }

}