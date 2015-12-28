<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(\Auth::check())
        return redirect()->route('members.index');
    else
        return View('auth.login');
});

Route::post('/authenticate', [
    'as'        => 'authenticate',
    'uses'      => 'LoginController@authenticate'
]);

Route::get('/logout', [
    'as'        => 'logout',
    'uses'      => 'LoginController@logout'
]);

Route::group(['prefix' => 'members', 'middleware' => 'auth'], function() {

    Route::get('todo', [
        'as'    => 'members.admin.todolist',
        'uses'  => 'AdminController@admin'
    ]);


    Route::get('backup', [
        'as'    => 'members.admin.backup',
        'uses'  => 'AdminController@backup'
    ]);

    Route::get('index', [
        'as'    => 'members.index',
        'uses'  => 'Members\UserController@index'
    ]);

    // HOME - Carian

    Route::get('/carian', [
        'as'    => 'members.carian',
        'uses'  => 'Members\CarianController@index'
    ]);

    Route::post('/carian', [
        'as'    => 'members.carian',
        'uses'  => 'Members\CarianController@noAnggota'
    ]);

    Route::get('pinjaman/biasa', [
        'as'    => 'members.profiles.pinjaman.biasa',
        'uses'  => 'Members\ProfileController@biasa'
    ]);

    Route::get('pertaruhan', [
        'as'    => 'members.pertaruhan.index',
        'uses'  => 'Members\PertaruhanController@index'
    ]);

    Route::post('pertaruhan', [
        'as'    => 'members.pertaruhan.index',
        'uses'  => 'Members\PertaruhanController@indexPost'
    ]);

    Route::post('pertaruhan/daftar', [
        'as'    => 'members.pertaruhan.daftarPost',
        'uses'  => 'Members\PertaruhanController@daftarPost'
    ]);


    // Change Password
    Route::get('password', [
        'as'    => 'members.password',
        'uses'  => 'Members\PasswordController@password'
    ]);

    Route::post('password', [
        'as'    => 'members.password.change',
        'uses'  => 'Members\PasswordController@change'
    ]);

    // Kad Ahli

    Route::get('kadahli', [
        'as'    => 'members.kadahli',
        'uses'  => 'Members\KadahliController@kadahli'
    ]);

    Route::get('mystyle', [
        'as'    => 'members.mystyle',
        'uses'  => 'Members\UserController@mystyle'
    ]);

    // Calculator - Pinjaman Wang Tunai
    Route::group(['prefix' => 'calculator'], function() {

        Route::get('pwt', [
            'as'    => 'members.calculator.pwtPost',
            'uses'  => 'Members\CalculatorController@pwt'
        ]);

        Route::post('pwt', [
            'as'    => 'members.calculator.pwt',
            'uses'  => 'Members\CalculatorController@pwtPost'
        ]);


    });



    // Roadtax
    Route::group(['prefix' => 'roadtax'], function() {

        Route::get('index', [
            'as'    => 'members.roadtax.index',
            'uses'  => 'Members\RoadtaxController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.roadtax.index',
            'uses'  => 'Members\RoadtaxController@indexPost'
        ]);


    });


    // Settings
    Route::group(['prefix' => 'settings'], function() {

        Route::get('tka', [
            'as'    => 'members.settings.tka',
            'uses'  => 'Members\SettingsController@tka'
        ]);

        Route::post('tka', [
            'as'    => 'members.settings.tka',
            'uses'  => 'Members\SettingsController@tkaPost'
        ]);

        Route::get('pengguna', [
            'as'    => 'members.settings.pengguna',
            'uses'  => 'Members\SettingsController@pengguna'
        ]);

        Route::post('pengguna', [
            'as'    => 'members.settings.penggunaPost',
            'uses'  => 'Members\SettingsController@penggunaPost'
        ]);

        Route::get('pengguna/delete/{id}', [
            'as'    => 'members.settings.pengguna.delete',
            'uses'  => 'Members\SettingsController@penggunaDelete'
        ]);

    });


    // Profile

    Route::group(['prefix' => 'profiles'], function() {

        Route::get('daftar', [
            'as'    => 'members.profiles.addUser',
            'uses'  => 'Members\ProfileController@addUser'
        ]);

        Route::post('daftar', [
            'as'    => 'members.profiles.addUserPost',
            'uses'  => 'Members\ProfileController@addUserPost'
        ]);

        Route::get('edit/{id}', [
            'as'    => 'members.profiles.edit',
            'uses'  => 'Members\ProfileController@edit'
        ]);

        Route::patch('update/{id}', [
            'as'    => 'members.profiles.update',
            'uses'  => 'Members\ProfileController@update'
        ]);

        Route::get('jadual', [
            'as'    => 'members.profile.jadual',
            'uses'  => 'Members\JadualController@carian'
        ]);

        Route::post('jadual/result', [
            'as'    => 'members.profile.jadual.result',
            'uses'  => 'Members\JadualController@result'
        ]);

    });


    //Yuran

    Route::get('/yuran', [
        'as'    => 'members.yuran.index',
        'uses'  => 'Members\YuranController@index'
    ]);

    Route::post('/yuran/tambahan', [
        'as'    => 'members.yurantambahan',
        'uses'  => 'Members\YuranController@yuranTambahan'
    ]);

    Route::post('/yuran/process', [
        'as'    => 'members.yuran.process',
        'uses'  => 'Members\YuranController@yuranProcess'
    ]);

    Route::get('/yuran/batal/{bulan}/{tahun}', [
        'as'    => 'members.yuran.batal',
        'uses'  => 'Members\YuranController@batal'
    ]);



    // Bayaran Tunai

    Route::get('/bayaran', [
        'as'    => 'members.bayaran.index',
        'uses'  => 'Members\BayaranController@index'
    ]);

    Route::post('/bayaran', [
        'as'    => 'members.bayaran.indexPost',
        'uses'  => 'Members\BayaranController@indexPost'
    ]);

    Route::post('bayaran/proses', [
        'as'    => 'members.bayaran.proses',
        'uses'  => 'Members\BayaranController@proses'
    ]);

    // LANGSAI

    Route::get('/langsai', [
        'as'    => 'members.bayaran.langsai',
        'uses'  => 'Members\BayaranController@langsai'
    ]);

    Route::post('/langsai', [
        'as'    => 'members.bayaran.langsaiPost',
        'uses'  => 'Members\BayaranController@langsaiPost'
    ]);

    Route::post('/langsai/proses', [
        'as'    => 'members.bayaran.langsaiProses',
        'uses'  => 'Members\BayaranController@langsaiProses'
    ]);



    // PINJAMAN  -> 1

    Route::group(['prefix' => 'pinjaman'], function() {

        Route::get('index', [
            'as'    => 'members.pinjaman.index',
            'uses'  => 'Members\PinjamanController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.pinjaman.proses',
            'uses'  => 'Members\PinjamanController@proses'
        ]);

        Route::post('overlap', [
            'as'    => 'members.pinjaman.overlap.process',
            'uses'  => 'Members\PinjamanController@overlapProcess'
        ]);


    });

    // Buku Sekolah  -> 2
    Route::group(['prefix' => 'bukusekolah'], function() {

        Route::get('index', [
            'as'    => 'members.bukusekolah.index',
            'uses'  => 'Members\BukusekolahController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.bukusekolah.indexPost',
            'uses'  => 'Members\BukusekolahController@indexPost'
        ]);

        Route::post('proses', [
            'as'    => 'members.bukusekolah.proses',
            'uses'  => 'Members\BukusekolahController@proses'
        ]);

    });

    // Cukai Jalan  -> 3
    Route::group(['prefix' => 'cukaijalan'], function() {

        Route::get('index', [
            'as'    => 'members.jalan.index',
            'uses'  => 'Members\JalanController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.jalan.indexPost',
            'uses'  => 'Members\JalanController@indexPost'
        ]);

        Route::post('proses', [
            'as'    => 'members.jalan.proses',
            'uses'  => 'Members\JalanController@proses'
        ]);

    });

    // Insurans  -> 4
    Route::group(['prefix' => 'insurans'], function() {

        Route::get('index', [
            'as'    => 'members.insurans.index',
            'uses'  => 'Members\InsuransController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.insurans.indexPost',
            'uses'  => 'Members\InsuransController@indexPost'
        ]);

        Route::post('proses', [
            'as'    => 'members.insurans.proses',
            'uses'  => 'Members\InsuransController@proses'
        ]);

    });

    // Tayar/Bateri -> 5
    Route::group(['prefix' => 'tayar'], function() {

        Route::get('index', [
            'as'    => 'members.tayar.index',
            'uses'  => 'Members\TayarController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.tayar.indexPost',
            'uses'  => 'Members\TayarController@indexPost'
        ]);

        Route::post('proses', [
            'as'    => 'members.tayar.proses',
            'uses'  => 'Members\TayarController@proses'
        ]);

    });

    // Kecemasan -> 7
    Route::group(['prefix' => 'kecemasan'], function() {

        Route::get('index', [
            'as'    => 'members.kecemasan.index',
            'uses'  => 'Members\KecemasanController@index'
        ]);

        Route::post('index', [
            'as'    => 'members.kecemasan.indexPost',
            'uses'  => 'Members\KecemasanController@indexPost'
        ]);

        Route::post('proses', [
            'as'    => 'members.kecemasan.proses',
            'uses'  => 'Members\KecemasanController@proses'
        ]);

    });


    // LAPORAN

    Route::group(['prefix' => 'laporan'], function () {

        Route::get('bayaran', [
            'as'    => 'members.laporan.lapBayaranIndividu',
            'uses'  => 'Members\LaporanController@lapBayaranIndividu'
        ]);

        Route::post('bayaran', [
            'as'    => 'members.laporan.lapBayaranIndividu',
            'uses'  => 'Members\LaporanController@lapBayaranIndividuPost'
        ]);

        Route::get('gaji', [
            'as'    => 'members.laporan.lapGajiIndividu',
            'uses'  => 'Members\LaporanController@lapGajiIndividu'
        ]);

        Route::post('gaji', [
            'as'    => 'members.laporan.lapGajiIndividu.generate',
            'uses'  => 'Members\LaporanController@lapGajiIndividuGenerate'
        ]);

        Route::get('cetak/lapGajiIndividu/{zon}/{bulan}/{tahun}', [
            'as'    => 'members.laporan.cetak.lapGajiIndividu',
            'uses'  => 'Members\CetakController@lapGajiIndividu'
        ]);

        Route::post('carian', [
            'as'    => 'members.laporan.carianPost',
            'uses'  => 'Members\LaporanController@carianPost'
        ]);

        Route::get('yuran', [
            'as'    => 'members.laporan.yuran',
            'uses'  => 'Members\YuranController@index'
        ]);

        Route::get('potongan', [
            'as'    => 'members.laporan.lapPotonganGaji',
            'uses'  => 'Members\LaporanController@lapPotonganGaji'
        ]);

        Route::post('potongan', [
            'as'    => 'members.laporan.lapPotonganGaji.generate',
            'uses'  => 'Members\LaporanController@lapPotonganGajiGenerate'
        ]);

    }); //end group['laporan']

    Route::group(['prefix' =>'penyata'], function() {

        Route::get('potongan/{id}', [
            'as'    => 'members.penyata.potongan',
            'uses'  => 'Members\PenyataController@wangtunai'
        ]);
    });


});// end group ['members']
