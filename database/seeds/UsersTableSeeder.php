<?php

use Illuminate\Database\Seeder;

   /*
    |----------------------------------------------------------------------------------------------------------------------
    |  Creation de mon seeder UsersTableSeeder afin d'inserer les données personnelles des utilisateurs dans la table users.
    |-----------------------------------------------------------------------------------------------------------------------
  */

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*
    |------------------------------------------------------------------------------
    |  Insertion des informations personnelles des utilisateurs dans ma table users.
    |------------------------------------------------------------------------------
    */
    public function run()

    {
        $users = factory(App\User::class, 10)->create();
        
        DB::Table('users')->insert(array([
            'name' => 'Diamile',
            'email' => 'diamilesarr2006@gmail.com',
            'password' => Hash::make('admin'),
            'admin' => rand(0, 1)
        ],
        [
            'name' => 'Eric',
            'email' => 'Eric@gmail.com',
            'password' => Hash::make('admin'),
            'admin' => rand(0, 1)
        ],

        [
            'name' => 'Geromes',
            'email' => 'gerome@live.fr',
            'password' => Hash::make('gerome'),
            'admin' => rand(0, 1)
        ],
        [
            'name' => 'Michael',
            'email' => 'micheal@gmail.fr',
            'password' => Hash::make('micheal'),
            'admin' => rand(0, 1)
        ],
        [
            'name' => 'George',
            'email' => 'george@bla.fr',
            'password' => Hash::make('george'),
            'admin' => rand(0, 1)
        ]));
    }
}
