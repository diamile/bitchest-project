<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

   /*
    |-------------------------------------------------------------------------------------------------------
    |  Création de mon model Wallet (portefeuille) qui me permet de faire des requétes sur ma table wallets
    |-------------------------------------------------------------------------------------------------------
  */ 

  
class Wallet extends Model
{

  /*
    |-------------------------
    |  mes champs modifiables
    |-------------------------
  */ 
    protected $fillable=[
      'user_id',
      'quantity',
      'crypto_id'
    ];


    /*
    |--------------------------------------------------------------------------------------------
    |  Création de mes relations entre le model Wallet et les models User,Currency et Transaction
    |--------------------------------------------------------------------------------------------
  */ 
    public function user(){
        return $this->hasMany('App\User');
    }

    public function currency(){
        return $this->hasOne('App\Currency','id');
    }

    public function cryptohistory(){
        return $this->hasOne('App\Transaction');
    }

}
