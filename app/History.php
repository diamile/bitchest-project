<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'date',
        'rate',
        'crypto_id'
    ];

    public function cryptocurency() 
	{
		return $this->hasOne('App\Curency');
	}

	public function cryptohistory(){
        return $this->hasOne('App\Transaction');
    }
}
