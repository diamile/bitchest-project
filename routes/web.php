<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//partie administrateurs
Route::get('users', 'UsersController@index')->name('users')->middleware('auth');

Route::get('personnal_data_admin', 'personalDataAdminController@index')->name('personnal_data_admin')->middleware('auth');

Route::get('crypto', 'CryptoAdminController@index')->name('cryptos_admin')->middleware('auth');


Route::resource('user_data', 'updateUserDataController');


//partie clients
Route::get('wallet', 'walletsController@index')->name('wallet')->middleware('auth');
Route::get('wallet_user_crypto_money/{crypto_id}', 'walletUserController@index')->name('wallet_user_crypto_money')->middleware('auth');
Route::get('cours_cryptomoney', 'CoursCryptoMoneyController@index')->name('cours_cryptos')->middleware('auth');


Route::get('graph/{crypto_id}', 'EvolutionCryptoMoneyController@index')->name('evolution')->middleware('auth');


Route::resource('buy', 'BuyCryptoController');

Route::resource('customer_data', 'CustomerDataController');




