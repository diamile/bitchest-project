<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Http\Request;

use App\User;


class updateUserDataController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


   

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
        $title = "Données de l'utilisateur";
        $users = User::where('id', $id)->get();
        $statut = ['Aministrateur', 'Client'];
       
        return view('admin/user_data', compact('title','users','statut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        

        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'admin' => 'required|numeric'
        );


        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('user_data/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        } else {
            

            $user = User::find($id);

            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->admin       = Input::get('admin');
            $user->save();

            Session::flash('flash_message', 'User successfully modified!');
         
            return redirect('users');
         }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deletedUser= User::findOrFail($id);

        $deletedUser->delete();
 
        Session::flash('flash_message', 'User successfully deleted!');
 
        return redirect('users');
    }
}
