<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    /*
    |---------------------------------------------------------------------------------------
    | Création de ma transactions qui contient les differentes informations des transactions
    |----------------------------------------------------------------------------------------
  */  
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

             /*
            |--------------------------------------------------------------------------------------------
            | liaison entre ma table transactions et la table wallets grace à un clé etrangére  wallet_id.
            |--------------------------------------------------------------------------------------------
           */  
            $table->unsignedInteger('wallet_id');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets');


             /*
            |--------------------------------------------------------------------------------------------
            | liaison entre ma table transactions et la table wallets grace à un clé etrangére  wallet_id.
            |--------------------------------------------------------------------------------------------
           */ 
            $table->unsignedInteger('crypto_history_id');
            $table->foreign('crypto_history_id')
                ->references('id')
                ->on('histories');


             /*
            |-----------------------------------------------------------------------------------------------------
            | Les differentes champs date de vente, d'achat et la quantité de crypto monnaie à vendre ou à acheter
            |-----------------------------------------------------------------------------------------------------
           */ 
            $table->dateTime('buy_date');
            $table->dateTime('sell_date');
            $table->decimal('quantity', 7, 2);
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
        Schema::dropIfExists('transactions');
    }
}
