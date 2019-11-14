<?php


use Illuminate\Database\Seeder;
use Carbon\Carbon;

  /*
    |------------------------------------------------------------------------------------------------
    |  Creation de mon seeder UsersTableSeeder afin d'inserer les données dans la table transactions.
    |------------------------------------------------------------------------------------------------
  */

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function createDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

     /*
    |-----------------------------------------------------------------------------
    | Inserer des données dans la table transactions.
    |-----------------------------------------------------------------------------
  */
    public function run()
    {
        $History = DB::table('histories')
            ->select(DB::raw(' wallets.id AS wallet_id, 
                                wallets.quantity AS quantity,
                                ANY_VALUE(histories.id) AS crypto_history_id, 
                                currencies.name, 
                                currencies.logo,
                                max(histories.date) AS date, 
                                ANY_VALUE(histories.rate) AS rate'))
            ->join('currencies', 'histories.crypto_id', '=', 'currencies.id')
            ->join('wallets', 'currencies.id', '=', 'wallets.id')
            ->groupBy('histories.crypto_id')
            ->orderBy('histories.crypto_id')
            ->get();

        $date = $this->createDate();
        foreach ($History as $Crypto) {
            DB::Table('Transactions')->insert(array([
                'wallet_id' => $Crypto->wallet_id,
                'crypto_history_id' => $Crypto->crypto_history_id,
                'buy_date' => $Crypto->date,
                'sell_date' => $date,
                'quantity' => $Crypto->quantity
            ]));
        }
    }
}
