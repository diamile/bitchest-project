<?php

use Illuminate\Database\Seeder;

 /*
    |--------------------------------------------------------------------------------------------------
    |  Creation de mon seeder HistoriesTableSeeder afin d'inserer les données  dans la table histories.
    |--------------------------------------------------------------------------------------------------
  */

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    /*
    |--------------------------------------------------
    |  Creation d'un format de date de façon aléatoire.
    |--------------------------------------------------
  */
     private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
        
    }



    public function run()
    {

     /*
    |-------------------------------------------------------------------------------------------------------------
    |  Creation de la fonction getFirstCotation qui  Renvoie la valeur de mise sur le marché de la crypto monnaie.
    |-------------------------------------------------------------------------------------------------------------
  */
        function getFirstCotation($cryptoname){
            return ord(substr($cryptoname,0,1)) + rand(0, 10);
        }


    /*
    |------------------------------------------------------------------------------------------------------------------
    |  Creation de la fonction getFirstCotation qui Renvoie la variation de cotation de la crypto monnaie sur un jour.
    |------------------------------------------------------------------------------------------------------------------
  */
        function getCotationFor($cryptoname){   
            return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
        }


        
 /*
    |------------------------------------------------------------------------------------------------------------------------------------------
    |  Insertion des valeurs mises sur le marché de la crypto monnaie et des les variations de la cotation  journaliére dans ma table histories.
    |-------------------------------------------------------------------------------------------------------------------------------------------
  */
        $currencies = App\Currency::all();
        foreach ($currencies as $currencie) {
              $firstCotation = getFirstCotation($currencie->name);
              for ($i=0; $i < 30; $i++) {

                $date = date('Y-m-d', strtotime(-$i.' day'));
               DB::Table('histories')->insert(array([
                'crypto_id' => $currencie->id,
                'date' => $date,
                'Rate' =>  getFirstCotation($currencie->name) + $firstCotation
                ]));
           }
        }
    }
}

