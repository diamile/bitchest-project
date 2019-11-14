<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    /*
    |-------------------------------------------------------------------------------------------------------------------------------------------------------
    | Création de ma table histories et mes differentes champs id, date,rate, et crypto_id qui est un clé etrangére faiasant reference à ma table currencies
    |-------------------------------------------------------------------------------------------------------------------------------------------------------
  */  
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('crypto_id')->unsigned();
            $table->foreign('crypto_id')
                ->references('id')
                ->on('currencies');
            $table->datetime('date');
            $table->decimal('rate',7,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */


    /*
    |------------------------------------------------------
    | Fonction qui sera appellée quand on fait un rollback
    |-----------------------------------------------------
  */  
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
