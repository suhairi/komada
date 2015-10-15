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

    Route::get('index', [
        'as' => 'members.index',
        'uses' => 'Members\UserController@index'
    ]);

    // HOME - Carian

    Route::get('/carian', [
        'as'    => 'members.carian',
        'uses'  => 'Members\CarianController@index'
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


    // Profile

    Route::group(['prefix' => 'profiles'], function() {

        Route::get('daftar', [
            'as'    => 'members.profiles.addUser',
            'uses'  => 'Members\ProfileController@addUser'
        ]);

        Route::get('edit/{id}', [
            'as'    => 'members.profiles.edit',
            'uses'  => 'Members\ProfileController@edit'
        ]);

        Route::patch('update/{id}', [
            'as'    => 'members.profiles.update',
            'uses'  => 'Members\ProfileController@update'
        ]);

    });


    //Yuran

    Route::post('/carian', [
        'as'    => 'members.carian',
        'uses'  => 'Members\CarianController@noAnggota'
    ]);

    Route::get('/yuran', [
        'as'    => 'members.yuran',
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





    // LAPORAN

    Route::group(['prefix' => 'laporan'], function () {

        Route::get('carian', [
            'as'    => 'members.laporan.carian',
            'uses'  => 'Members\LaporanController@carian'
        ]);

        Route::post('carian', [
            'as'    => 'members.laporan.carianPost',
            'uses'  => 'Members\LaporanController@carianPost'
        ]);

        Route::get('yuran', [
            'as'    => 'members.laporan.yuran',
            'uses'  => 'Members\Laporan\YuranController@index'
        ]);

    }); //end group['laporan']


});// end group ['members']
