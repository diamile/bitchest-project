<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
    |----------------------------------------------------------------------------------------
    | Création de mon model History afin de faire des requétes sur cette table en particulier
    |-----------------------------------------------------------------------------------------
  */  

class History extends Model
{
    /*
    |-----------------------
    | mes champs modifiables
    |-----------------------
  */ 

    protected $fillable = [
        'date',
        'rate',
        'crypto_id'
    ];


    /*
    |-----------------------------------------------------------------------------------
    | Création des relations entre le model History et les models Currency et Transaction
    |------------------------------------------------------------------------------------
  */ 

    public function cryptocurency() 
	{
		return $this->hasOne('App\Curency');
	}

	public function cryptohistory(){
        return $this->hasOne('App\Transaction');
    }
}
