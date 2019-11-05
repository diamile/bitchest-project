<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Currency;
use App\Wallet;
use App\User;

class walletsController extends Controller
{

    //il faut s'authentifier afin d'arriver à cdans cette page
    public function __construct()
    
    {
        $this->middleware('auth');
    }


    public function index(){
        $title = 'Mon portefeuille';

        
        return view('customer.wallet',compact('title'));
    }
}
