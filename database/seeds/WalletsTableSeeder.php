<?php

use Illuminate\Database\Seeder;

 /*
    |--------------------------------------------------------------------------------------------
    |  Creation de mon seeder WalletsTableSeeder afin d'inserer des données dans la table wallets
    |--------------------------------------------------------------------------------------------
  */
class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     
    public function run()
    {
    
    /*
    |----------------------------------------------
    |  Insertion  des données dans la table wallets
    |----------------------------------------------
    */
        DB::Table('wallets')->insert(array([
            'user_id' => 1,
            'crypto_id' => 1,
            'Quantity' => rand(2, 100)
        ],
        [
            'user_id' => 2,
            'crypto_id' => 2,
            'Quantity' => rand(2, 100)
        ],
        [
            'user_id' => 2,
            'crypto_id' => 2,
            'Quantity' => rand(2, 100)
        ],
        [                            
            'user_id' => 3,
            'crypto_id' =>3,
            'Quantity' => rand(2, 100)
        ],
        [
            'user_id' => 4,
            'crypto_id' => 4,
            'Quantity' => rand(2, 100)
        ],
        [
            'user_id' => 5,
            'crypto_id' => 5,
            'Quantity' => rand(2, 100)
        ],
        [                           
            'user_id' => 6,
            'crypto_id' => 6,
            'Quantity' => rand(2, 100)
        ],
        [                            
            'user_id' => 7,
            'crypto_id' => 7,
            'Quantity' => rand(2, 100)
        ]));
    }
}
