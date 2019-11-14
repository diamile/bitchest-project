<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /*
    |--------------------------------------------------------------------------------------------
    | Création de mon model Transaction afin de faire des requétes sur cette table en particulier
    |--------------------------------------------------------------------------------------------
  */ 

class Transaction extends Model
{

	/*
    |-----------------------
    | mes champs modifiables
    |-----------------------
  */ 
    protected $fillable = [
        'wallet_id',
        'crypto_history_id',
        'buy_date',
        'sell_date',
        'quantity'
    ];

/*
    |-----------------------------------------------------------------------------------
    | Création des relations entre le model Transaction et les models Wallet et History
    |------------------------------------------------------------------------------------
  */ 
	public function wallet() 
	{
		return $this->belongsTo('App\Wallet');
	}

	public function cryptohistory() 
	{
		return $this->belongsTo('History');
	}
}


