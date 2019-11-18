<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Form;
use App\User;
use App\Sidenav;
use App\Transaction;
use App\Wallet;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

 /*
    |---------------------------------------------------------------------
    | Creation de BuyCryptoController qui gére l'achat des crypto monnaies
    |---------------------------------------------------------------------
 */
class BuyCryptoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Achat de crypto monnaie';
        $crypto_currency = Currency::all();
        $users = User::where('id', Auth::id())->get();
        $wallets = Wallet::where('user_id', Auth::id())->get();

        $total_wallet = 0;
        foreach ($wallets as $wallet) {
            $Currency = Currency::where('id', $wallet->crypto_id)->first();
            $boughts_totale = DB::table('histories')
                ->select(DB::raw(' max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate, ANY_VALUE(histories.crypto_id) AS crypto_id'))
                ->where('crypto_id', $wallet->crypto_id)
                ->groupBy('histories.crypto_id')
                ->orderBy('histories.crypto_id')
                ->get();

            if (!isset($bought_list[$wallet->crypto_id])) {
                $bought_list[$wallet->crypto_id]['Currency'] = $Currency;
                $bought_list[$wallet->crypto_id]['quantity'] = $wallet->quantity;
                foreach ($boughts_totale as $bought) {

                    $rate = $wallet->quantity*$bought->rate;
                    $bought_currencies_list[$wallet->crypto_id]['bought'] = $rate;
                }
            }
            else {
                $bought_list[$wallet->crypto_id]['quantity'] += $wallet->quantity;

            }
            $total_wallet += $wallet->quantity*$bought->rate;
        };

        

        return view('customer/buy', compact('title','crypto_currency','users','total_wallet'));
    }

   /*
    |------------------------------------------------------------------------------------------
    | Modification du nom et de la quantité du crypto monnaie que l'utilisateur souhaite acheter
    |-----------------------------------------------------------------------------------------
 */
    public function update(Request $request)
    {


        $rules = [
            'quantity' => 'required',
            'selectbasic' => 'required'
        ];

        $input = $request->only(
            'quantity',
            'selectbasic'
        );

        $validator = Validator::make($input, $rules);

        //le cas ou y'a des erreurs au moment de l'achat.
        if($validator->fails()) {
           return Redirect::to('buy')
                ->withErrors($validator);
        }

        $users = User::where('id', Auth::id())->get();
        foreach ($users as $user) {

            $money_name_id = DB::table('wallets')
                ->select(DB::raw(' wallets.id AS wallet_id, wallets.user_id, wallets.crypto_id'))
                ->where('wallets.user_id', $user->id)
                ->get();
        }
       
        //recupration du nom du crypto monnaie et l'id correspondant
        $money = DB::table('currencies')
                    ->select(DB::raw('currencies.id, currencies.name, currencies.logo'))
                    ->where('currencies.id', $input['selectbasic'])
                    ->get();

        //bouclé afin du recuprerer les noms et id des crypto monnaies
        foreach ($money as $moneys) {

           $money_name = $moneys->name;
           $crypto_histories = $moneys->id;
        }

        foreach ($money_name_id as $money_name_ids) {
            $wallet = $money_name_ids->wallet_id;
            
        }

        $crypto_history = DB::table('histories')
                ->select(DB::raw(' ANY_VALUE(histories.id) AS crypto_history_id,max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate, ANY_VALUE(histories.crypto_id) AS crypto_id'))
                ->where('crypto_id', $crypto_histories)
                ->groupBy('histories.crypto_id')
                ->orderBy('histories.crypto_id')
                ->get();

        foreach ($crypto_history as  $crypto_historys) {
            $crypto_his_id = $crypto_historys->crypto_history_id;
            $buy_date_trans = $crypto_historys->date;
            $crypto_id_trans = $crypto_historys->crypto_id;
        }

        //creation d'une cotation
        function getFirstCotation($cryptoname){
            return ord(substr($cryptoname,0,1)) + rand(0, 10);
        }

        function getCotationFor($cryptoname){   
            return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
        }

        $sell_date_tras = new Carbon();

        $quantity = $input['quantity'];
      
        $crypto_history_id = $crypto_his_id;
        $buy_date = $buy_date_trans;
        $sell_date = $sell_date_tras;

        $getFirstCotation = getFirstCotation($moneys->name);

        //insertion des informations cryptos quantité, nom, prix dans mon portefeuille apres chaque achat.
        $crypto_id = DB::table('wallets')->insertGetId(
            ['crypto_id' => $crypto_histories, 'user_id' => $user->id, 'quantity' => $quantity]
        );

        //insertion des information de chaque crypto monnaie dans ma table histories.
        $crypto_histories_trans = DB::table('histories')->insertGetId(
            ['crypto_id' => $crypto_id_trans, 'date' => $sell_date_tras, 'rate' => $getFirstCotation]
        );

        $get_crypto_ids = DB::table('wallets')
                    ->select(DB::raw('Max(id) AS wallets'))
                    ->get();

        foreach ($get_crypto_ids as $get_crypto_id) {
            
            $trans_crypto_id = $get_crypto_id->wallets;
            $transactions = DB::table('transactions')->insertGetId(
                    ['quantity' => $quantity,'quantity' => $quantity, 'wallet_id' => $trans_crypto_id, 'crypto_history_id' => $crypto_history_id, 'buy_date' => $buy_date, 'sell_date' => $sell_date]
                );
        }

        Session::flash('flash_message', 'Votre achat est validé!');

        return redirect('wallet');
    }

}

  