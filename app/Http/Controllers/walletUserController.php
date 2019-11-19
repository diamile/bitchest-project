<?php

namespace App\Http\Controllers;

use App\Currency;
use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Transaction;
use App\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class walletUserController  extends Controller
{

    public $buy_euro;
     /*
    |----------------------------------------------------------------------------
    |  Creation de walletUserController afin de returner ma page wallet_crypto_mone
    |----------------------------------------------------------------------------
  */
   
    public function __construct(Collection $buy_euro)
    {
        $this->buy_euro=$buy_euro;

        $this->middleware('auth');
    }

   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $crypto_id)
    {
        $crypto = Currency::find($crypto_id);
        $title = $crypto->name;

        // recuperation du portefeuille de l'utilisateur encours
        $wallets = Wallet::where('user_id', Auth::id())
            ->where('crypto_id', $crypto_id)
            ->get();

        $wallet_totals = Wallet::where('user_id', Auth::id())->get();
        $users = User::where('id', Auth::id())->get();

        $total_wallet = 0;
        foreach ($wallet_totals as $wallet_total) {
            $CryptoCurrency = Currency::where('id', $wallet_total->crypto_id)->first();
            $boughts_totale = DB::table('histories')
                ->select(DB::raw(' max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate, ANY_VALUE(histories.crypto_id) AS crypto_id'))
                ->where('crypto_id', $wallet_total->crypto_id)
                ->groupBy('histories.crypto_id')
                ->orderBy('histories.crypto_id')
                ->get();

              
            if (!isset($bought_list[$wallet_total->crypto_id])) {
                $bought_list[$wallet_total->crypto_id]['CryptoCurrency'] = $CryptoCurrency;
                $bought_list[$wallet_total->crypto_id]['quantity'] = $wallet_total->quantity;

                foreach ($boughts_totale as $bought) {

                    $rate = $wallet_total->quantity*$bought->rate;
                    $bought_list[$wallet_total->crypto_id]['bought'] = $rate;
                }
            }
            else {
                $bought_list[$wallet_total->crypto_id]['quantity'] += $wallet_total->quantity;

            }
            $total_wallet += $wallet_total->quantity*$bought->rate;
        };

        //Récupération des transaction d'une crypto particulière de l'utilisateur en cours
        $transactions = array();
        
        foreach ($wallets as $wallet) {
            $transactions = Transaction::where('wallet_id', $wallet->id)->get(); 
            $boughts = DB::table('histories')
                    ->select(DB::raw(' max(transactions.buy_date) AS date_transaction,max(histories.date) AS date, ANY_VALUE(histories.rate) AS rate, ANY_VALUE(transactions.wallet_id) AS wallet_id,ANY_VALUE(transactions.quantity) AS quantity, ANY_VALUE(transactions.crypto_history_id) AS crypto_history_id'))
                    ->join('transactions', 'histories.id', '=', 'transactions.crypto_history_id')
                    ->where('transactions.wallet_id', $wallet->id)
                    ->groupBy('histories.crypto_id')
                    ->orderBy('histories.crypto_id')
                    ->get();

        }

        // $rate = Cours le plus récent
        foreach ($boughts as $bought){
            $rate = $bought->rate;

            $boughts_rate = DB::table('transactions')
                ->join('histories', 'transactions.buy_date', '=', 'histories.date')
                ->join('currencies', 'currencies.id', '=', 'histories.crypto_id')
                ->where('transactions.buy_date', $bought->date_transaction)
                ->get();

        }



        //prix en euros lors de l'achat
        $buy_euro = $boughts_rate[0]->quantity * $boughts_rate[0]->rate;

    
        //prix en euros en fonction de l'evolution du taux
        $sell_euro = $boughts_rate[0]->quantity * $rate;

       
        //plus-value:difference entre le prix d'achat et le prix de revente
        $capital_gain = $sell_euro - $buy_euro;


        //calcul du total de cryptos
        $total = 0;
        foreach($transactions as $transaction) {
            $total += $transaction->quantity;
        }


        return view('customer/wallet_crypto_money', compact('title', 'transactions', 'total', 'users', 'rate', 'capital_gain', 'crypto','total_wallet','sell_euro'));
    }



 /*
    |------------------------------------------------------------------------------------------------------------------------------
    |  Creation de de la fonction destroy qui supprime automatiquement le crypto monnai dans le portefeuille aprés l'avoir vendu
    |-------------------------------------------------------------------------------------------------------------------------------
  */
    public function destroy($id){

        $destroyCrypto=wallet::find($id);

        $transaction_in_live=Transaction::find($id)->wallet;

        $quantity=$transaction_in_live->quantity;

        $history=History::find($id)->rate;
        
        $prix_vente=0;
       
       //la valeur du crypto monnaie aprés vente.
        $prix_vente+=$quantity*$history;

        Session::put('prix_vente', $prix_vente);
      
        //supression du crypto monnaie dans ma table portefeuille apres vente.
        $destroyCrypto->delete();

        Session::flash('flash_message', 'Votre crypto monnaie a  été vendu avec succées !');

          return redirect('/wallet')->with('success',$prix_vente);

    
    }
}


