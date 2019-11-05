<?php

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('wallets')->insert(array([
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [                            
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [                           
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ],
        [                            
            'user_id' => rand(1, 10),
            'crypto_id' => rand(1, 10),
            'Quantity' => rand(2, 1000)
        ]));
    }
}
