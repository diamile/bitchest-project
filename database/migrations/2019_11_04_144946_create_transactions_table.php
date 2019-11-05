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
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('wallet_id');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets');

            $table->unsignedInteger('crypto_history_id');
            $table->foreign('crypto_history_id')
                ->references('id')
                ->on('histories');

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
