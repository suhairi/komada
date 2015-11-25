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

    // Calculator
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

    // PINJAMAN

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

    // Road Tax
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


    // LAPORAN

    Route::group(['prefix' => 'laporan'], function () {

        Route::get('potonganGaji', [
            'as'    => 'members.laporan.potonganGaji',
            'uses'  => 'Members\LaporanController@potonganGaji'
        ]);

        Route::post('carian', [
            'as'    => 'members.laporan.carianPost',
            'uses'  => 'Members\LaporanController@carianPost'
        ]);

        Route::get('yuran', [
            'as'    => 'members.laporan.yuran',
            'uses'  => 'Members\YuranController@index'
        ]);

    }); //end group['laporan']

    Route::group(['prefix' =>'penyata'], function() {

        Route::get('potongan/{id}', [
            'as'    => 'members.penyata.potongan',
            'uses'  => 'Members\PenyataController@wangtunai'
        ]);
    });


});// end group ['members']
