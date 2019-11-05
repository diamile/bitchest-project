<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usersController extends Controller
{
     //il faut s'authentifier afin d'arriver à cdans cette page
     public function __construct()
    
     {
         $this->middleware('auth');
     }
 
 
     public function index(){
         $title = 'Liste de nos Clients';
 
         
         return view('admin.users',compact('title'));
     }
}
