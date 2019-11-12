<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class usersController extends Controller
{
     //il faut s'authentifier afin d'arriver à cdans cette page
     public function __construct()
    
     {
         $this->middleware('auth');
     }
 
 
     public function index(){
         $title = 'Liste de nos Clients';
         
        //  $users = User::paginate(6);
        $users=DB::table('users')->orderBy('created_at','DESC')->paginate(6);
        
         $statut = ['Aministrateur', 'Client'];
        return view('admin/users', compact('title', 'users', 'statut'));
         
     }
}
