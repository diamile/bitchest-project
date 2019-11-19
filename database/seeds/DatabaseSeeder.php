<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


     /*
    |-----------------------------
    |  L'appel de tous mes seeders
    |------------------------------
  */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(WalletsTableSeeder::class);
        $this->call(HistoriesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
    }
}
