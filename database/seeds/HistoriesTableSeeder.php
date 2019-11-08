<?php

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //creation d'une format de date
    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    } 


    public function run()
    {
        //cotations
        function cotationRate($cryptoname){
            return ord(substr($cryptoname,0,1)) + rand(0, 10);
        }
        

        function getCotation($cryptoname){   
            return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
        }

        $currencies = App\Currency::all();

        foreach ($currencies as $currencie) {

            $cotation = cotationRate($currencie->name);
            for ($i=0; $i < 30; $i++) {

                $date = date('Y-m-d', strtotime(-$i.' day'));
                DB::Table('histories')->insert(array([
                'crypto_id' => $currencie->id,
                'date' => $date,
                'Rate' =>  getCotation($currencie->name) + $cotation
                ]));
           }
        }

    }
}

