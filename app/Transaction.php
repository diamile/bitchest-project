<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'crypto_history_id',
        'buy_date',
        'sell_date',
        'quantity'
    ];


	public function wallet() 
	{
		return $this->belongsTo('App\Wallet');
	}

	public function cryptohistory() 
	{
		return $this->belongsTo('History');
	}
}


