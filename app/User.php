<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

  /*
    |-----------------------------
    |  Creation de mon model user 
    |-----------------------------
  */ 
class User extends Authenticatable
{
    use Notifiable;

     /*
    |---------------------------------------
    |  mes champs modifiable avec $fillable
    |---------------------------------------
  */ 
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
     /*
    |-------------------------------------------------------------------------------------------------------------
    |  Creation de ma fonction qui permet de verifier si la personne connectée est un administrateur ou un clients
    |--------------------------------------------------------------------------------------------------------------
  */ 
    public function isAdmin(){

        if($this->admin == 1){

            return true;

        }

        return false;

    }

}


