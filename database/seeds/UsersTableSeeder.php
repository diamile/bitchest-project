<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
