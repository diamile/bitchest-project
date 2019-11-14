<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


     /*
    |----------------------------------------------------------------------------
    | Création de ma table currencies et mes differentes champs id, name, et logo
    |----------------------------------------------------------------------------
  */  
    public function up()
    {
        
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->binary('logo') ;
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
    | Fonction qui sera executée quand on fait un rollback
    |------------------------------------------------------
  */  
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
