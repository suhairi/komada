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

Route::group(['prefix' => 'members'], function() {

    Route::get('index', [
        'as'    => 'members.index',
        'uses'  => 'Members\UserController@index'
    ]);

    Route::get('/carian', [
        'as'    => 'members.carian',
        'uses'  => 'Members\CarianController@index'
    ]);

    Route::post('/carian', [
        'as'    => 'members.carian',
        'uses'  => 'Members\CarianController@noAnggota'
    ]);

    Route::get('/daftar', [
        'as'    => 'members.addUser',
        'uses'  => 'Members\UserController@addUser'
    ]);

    Route::get('/yuran', [
        'as'    => 'members.yuran',
        'uses'  => 'Members\YuranController@index'
    ]);

    Route::post('/yuran/process', [
        'as'    => 'members.yuran.process',
        'uses'  => 'Members\YuranController@yuranProcess'
    ]);

});
