<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
    |----------------------------------------------------------------------------------------
    | Création de mon model Currency afin de faire des requétes sur cette table en particulier
    |-----------------------------------------------------------------------------------------
  */  

class Currency extends Model
{

 /*
    |-----------------------
    | mes champs modifiables
    |-----------------------
*/ 
    protected $fillable = [
        'name',
        'logo',
    ];


  /*
    |-------------------------------------------------------------------------------
    | Création des relations entre le model Currency et les models History et Wallet
    |-------------------------------------------------------------------------------
  */ 
   	public function cryptohistorys(){
        return $this->hasOne('App\History');
    }

    public function wallet(){
        return $this->belongsTo('App\Wallet');
    }

}
