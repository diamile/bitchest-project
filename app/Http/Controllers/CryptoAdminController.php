<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use App\History;
use Illuminate\Support\Facades\Auth;
use DB;

class CryptoAdminController extends Controller
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
        $crypto_currency = Currency::all();

        $crypto_history = DB::table('histories')
            ->select(DB::raw('currencies.name,currencies.logo, max(histories.date), ANY_VALUE(histories.rate) AS rate'))
            ->join('currencies', 'histories.crypto_id', '=', 'currencies.id')
            ->groupBy('histories.crypto_id')
            ->orderBy('histories.crypto_id')
            ->get();

        return view('admin/cryptoAdmin', compact('title','crypto_currency','crypto_history'));
    }
}
