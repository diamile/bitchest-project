<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable=[
      'user_id',
      'quantity',
      'crypto_id'
    ];


    public function user(){
        return $this->hasMany('App\User');
    }

    public function currency(){
        return $this->hasOne('App\Currency','id');
    }

}
