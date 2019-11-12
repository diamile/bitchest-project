<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class CreateUserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    

    public function create()
    {
        $title='création d\'un nouveau utiliateurs';
        return view('admin.create',compact('title'));
    }  


    
     public function store(Request $request)
    {

  
    
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'admin' => 'required|numeric'
        );


         $validator = Validator::make(Input::all(), $rules);

            $newUser= new User;

            $newUser->name = $request->input('name');
            $newUser->email = $request->input('email');
            $newUser->admin = $request->input('admin');
            $newUser->password= Hash::make($request->input('password'));
            
            $newUser->save();

            Session::flash('flash_message', 'Nouveau Utilisateur crée avec succés!');
         
            return redirect('users');
         
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
