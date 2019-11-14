<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    /*
    |-------------------------------------------------------------------------------
    | Création de ma table wallets qui contient les cryptos-monnai d'un utilisateur
    |-------------------------------------------------------------------------------
  */  
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');

              /*
            |----------------------------------------------------------------------------------
            | liaison entre ma table wallets et la table users grace à un clé etrangére user_id.
            |-----------------------------------------------------------------------------------
           */  
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            


             /*
            |-----------------------------------------------------------------------------------------
            | liaison entre ma table wallets et ma table currencies grace à un clé etrangére crypto_id.
            |------------------------------------------------------------------------------------------
           */ 
            $table->integer('crypto_id')->unsigned();
            $table->foreign('crypto_id')
                ->references('id')
                ->on('currencies');

            $table->decimal('quantity',7,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
