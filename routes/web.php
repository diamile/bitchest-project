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


 /*
    |-----------------------------------------------
    | Route qui gére la page d'accueil de bitchest
    |-----------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

/*
    |-------------------------------------
    | Route qui gére la page de connexion
    |--------------------------------------
*/

Route::get('/home', 'HomeController@index')->name('home');


 /*
    |----------------------------------------------------------------
    | Route qui affiche la page d'accueil de la partie administration
    |---------------------------------------------------------------
*/
Route::get('users', 'UsersController@index')->name('users')->middleware('auth');



/*
    |-----------------------------------------------------------------------
    | Route qui affiche les donnés personnelles des utilisateurs coté admin
    |-----------------------------------------------------------------------
*/

Route::get('personnal_data_admin', 'personalDataAdminController@index')->name('personnal_data_admin')->middleware('auth');


/*
    |---------------------------------------------------------
    | Route qui affiche la liste des cours de crypto monnaies
    |---------------------------------------------------------
*/

Route::get('crypto', 'CryptoAdminController@index')->name('crypto')->middleware('auth');



/*
    |----------------------------------------------------------------------------------------------------------------------
    | Route qui affiche les données personnelles des utilisateurs (administrateurs et client) et qui permet de les modifier
    |----------------------------------------------------------------------------------------------------------------------
*/
Route::resource('user_data', 'updateUserDataController');


/*
    |-------------------------------------------------------------------------------------------------------------------------
    | Route qui permet d'afficher le formulaire de creation de nouveaux utilisateurs afin d'en créer de nouveaux utilisateurs
    |-------------------------------------------------------------------------------------------------------------------------
*/
Route::resource('AdminUser', 'CreateUserAdminController');




/*
    |-------------------------------------------------------------------------------------------------------------------------
    | Route qui permet de recuperer les informations des utilisateurs nouvellement crées et l'insertion dans la base de donnée
    |-------------------------------------------------------------------------------------------------------------------------
*/
Route::patch('store', 'CreateUserAdminController@store')->name('AdminUser.store');


/****************************************************PARTIE CLIENT****************************************************************/ 



/*
    |--------------------------------------------------------------------------------------
    | Les routes qui permet d'afficher la page d'accueil de chaque clients (portefeuille)
    |--------------------------------------------------------------------------------------
*/
Route::get('wallet', 'walletsController@index')->name('wallet')->middleware('auth');


/*
    |-------------------------------------------------------------------------------
    | La Route qui permet d'afficher l'historique d'achat d'un crypto monnaie donnée
    |----------------------------------------------------------------------------------
*/

Route::get('wallet_user_crypto_money/{crypto_id}', 'walletUserController@index')->name('wallet_user_crypto_money')->middleware('auth');


/*
    |----------------------------------------------------------------------------------------
    | La Route qui permet de supprimer dans le portefeuille une crypto monnai une fois vendu
    |----------------------------------------------------------------------------------------
*/

Route::get('destroy/{crypto_id}','walletUserController@destroy')->name('destroyCrypto')->middleware('auth');


/*
    |---------------------------------------------------------------------
    | La Route qui permet d'afficher la liste des cours de crypto monnai
    |--------------------------------------------------------------------
*/

Route::get('cours_cryptomoney', 'CoursCryptoMoneyController@index')->name('cours_cryptos')->middleware('auth');


/*
    |------------------------------------------------------------------------------------------
    | La Route qui permet d'afficher la graphe qui montre l'evolution de chaque crypto monnai
    |--------------------------------------------------------------------------------------------
*/

Route::get('graph/{crypto_id}', 'EvolutionCryptoMoneyController@index')->name('evolution')->middleware('auth');


/*
    |-----------------------------------------------------------------------
    | La Route qui permet au client de faire des achats des crypto monnaies
    |-----------------------------------------------------------------------
*/
Route::resource('buy', 'BuyCryptoController');



/*
    |-------------------------------------------------------------------------------------
    | La Route qui permet d'afficher et de modifier les données personnelles des clients
    |-------------------------------------------------------------------------------------
*/

Route::resource('customer_data', 'CustomerDataController');




