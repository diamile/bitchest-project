<?php

use Illuminate\Database\Seeder;

   /*
    |-------------------------------------------------------------------------------------------------------------------------
    |  Creation de mon seeder CurrencyTableSeeder afin d'inserer les noms et logos des cryto monnaies dans ma table currencies.
    |--------------------------------------------------------------------------------------------------------------------------
  */ 
class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {

      /*
    |-----------------------------------------------------------------------------
    |  Inserertion  des noms et logos des cryto monnaies dans ma table currencies.
    |-----------------------------------------------------------------------------
    */ 
        DB::Table('currencies')->insert(array(
            
            [
            'name' => 'Bitcoin',
            'logo' => 'bitcoin.png',
           ],
            [
                'name' => 'Ethereum',
                'logo' => 'ethereum.png',
            ],
            [
                'name' => 'Ripple',
                'logo' => 'ripple.png',
            ],
            [
                'name' => 'Bitcoin Cash',
                'logo' => 'bitcoin-cash.png',
            ],
            [
                'name' => 'Cardano',
                'logo' => 'cardano.png',
            ],
            [
                'name' => 'Litecoin',
                'logo' => 'litecoin.png',
            ],
            [
                'name' => 'NEM',
                'logo' => 'nem.png',
            ],
            [
                'name' => 'Stellar',
                'logo' => 'stellar.png',
            ],
            [
                'name' => 'IOTA',
                'logo' => 'iota.png',
            ],
            [
                'name' => 'DASH',
                'logo' => 'dash.png',
            ]));
    }
    
}
