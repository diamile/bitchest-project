<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Wallet;
use Illuminate\Support\Facades\DB;
use App\Currency;

class CustomerDataController extends Controller
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
        $title = 'Mes données personnelles';

        $users = User::where('id', Auth::id())->get();

       
       
        return view('customer/customer_data', compact('title','total'));
    }


    public function edit($id)
    {
        $title = 'Mes données personnelles';

        $users = User::where('id', Auth::id())->get();
        $wallets = Wallet::where('user_id', Auth::id())->get();

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
       
        return view('customer/customer_data', compact('title','users','total_wallet'));
    }

    public function update($id)
    {

        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'password' => 'required'
        );


        $validator = Validator::make(Input::all(), $rules);

        
        if ($validator->fails()) {
            return Redirect::to('user_data/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        } else {
            
            //modification des données

            $user = User::find($id);

            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->password       = Input::get('password');
            $user->save();

            Session::flash('flash_message', 'Vos données  ont été bien modifié');
         
            return redirect('wallet');
         }

    }
}
