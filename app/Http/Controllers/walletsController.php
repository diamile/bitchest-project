<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Currency;
use App\Wallet;
use App\User;
use DB;

class walletsController extends Controller
{

    //il faut s'authentifier afin d'arriver à cdans cette page
    public function __construct()
    
    {
        $this->middleware('auth');
    }


    public function index(){
        $title = 'Mon portefeuille';
        //recuperation  de l'utilisateur qui s'est connecté
        $users = User::where('id', Auth::id())->get();

        //recuperation des du portefeuille de l'utlisateur qui s'est connécté
        $wallets = Wallet::where('user_id', Auth::id())->get();


        //liste des achats
        $bought_list=[];

        $bought=[];

        $total_wallet=0;

        foreach($wallets as $wallet){

           
            
         $currency=Currency::where('id',$wallet->crypto_id)->first();
         
         dd($currency);
           
         $boughts = DB::table('histories')
         ->select(DB::raw(' max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate, ANY_VALUE(histories.crypto_id) AS crypto_id'))
         ->where('crypto_id', $wallet->crypto_id)
         ->groupBy('histories.crypto_id')
         ->orderBy('histories.crypto_id')
         ->get();

        //  dd($boughts);

        }



        

        
        return view('customer.wallet',compact('title','users'));
    }
}
