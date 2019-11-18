<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

 /*
    |------------------------------------------------------------------------------------------------------
    | creation de personalDataAdminController qui affiche les données personnelles de l'utilisateur encours
    |------------------------------------------------------------------------------------------------------
*/
class personalDataAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     /*
    |-------------------------------------------------------------------------------------------
    |  method index qui me permet d'afficher les données personnelles de l'utilisateur encours
    |-------------------------------------------------------------------------------------------
   */
    
    public function index()
    {
         $title = "Données de l'utilisateur";
        $users = User::where('id', Auth::id())->get();
        $statut = ['Aministrateur', 'Client'];
       
        return view('admin/user_data', compact('title','users','statut')); 
    }
}



