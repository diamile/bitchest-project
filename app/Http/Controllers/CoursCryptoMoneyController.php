<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use App\History;
use App\Wallet;
use App\User;
use DB;

class CoursCryptoMoneyController extends Controller
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
        $title = 'Cours des crypto monnaies';

        $crypto_currencies = Currency::all();
        $users = User::where('id', Auth::id())->get();
        $wallets = Wallet::where('user_id', Auth::id())->get();
        $crypto_history = DB::table('histories')
            ->select(DB::raw('currencies.id,currencies.name, currencies.logo, max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate'))
            ->join('currencies', 'histories.crypto_id', '=', 'currencies.id')
            ->groupBy('histories.crypto_id')
            ->orderBy('histories.crypto_id')
            ->get();

        $total_wallet = 0;
            foreach ($wallets as $wallet) {
                $Currency = Currency::where('id', $wallet->crypto_id)->first();
                $boughts = DB::table('histories')
                    ->select(DB::raw(' max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate, ANY_VALUE(histories.crypto_id) AS crypto_id'))
                    ->where('crypto_id', $wallet->crypto_id)
                    ->groupBy('histories.crypto_id')
                    ->orderBy('histories.crypto_id')
                    ->get();

                if (!isset($bought_list[$wallet->crypto_id])) {
                    $bought_list[$wallet->crypto_id]['Currency'] = $Currency;
                    $bought_list[$wallet->crypto_id]['quantity'] = $wallet->quantity;
                    foreach ($boughts as $bought) {

                        $rate = $wallet->quantity*$bought->rate;
                        $bought_list[$wallet->crypto_id]['bought'] = $rate;
                    }
                }
                else {
                    $bought_list[$wallet->crypto_id]['quantity'] += $wallet->quantity;

                }
                $total_wallet += $wallet->quantity*$bought->rate;
            };

        return view('customer/cours_cryptomoney', compact('title', 'crypto_currencies', 'wallets','users','crypto_history','total_wallet'));
    }
}