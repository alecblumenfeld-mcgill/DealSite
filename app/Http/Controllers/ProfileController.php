<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }


    public function registerUser(Request $request)
    {
        $input = Input::all();

        if ($input["masterPassword"] != env('MASTERPASSWORD')) {
            abort(403, 'Unauthorized action.');
        }

        $user = new User;

        $user->email = $input["email"];
        $user->password =  Hash::make($input["password"]);
        $user->sponsor = $input["sponsor"];

        $user->save();

        return Redirect::to('manage/login');


    }
    public function login()
    {
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            echo "Please Try Again";
        } else {

        // create our user data for the authentication
            $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
            );
            if (Auth::attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            return Redirect::to('manage');

            } else {        

                // validation not successful, send back to form 
                return Redirect::to('login');

            }

        }

    }

    public function logout()
    {

        Auth::logout(); // log the user out of our application
        return Redirect::to('manage/login'); 
    }


            


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
