<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;
use Parse\ParseQuery;
use Parse\ParseObject;
use Input;
class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showUnused()
    {
        $user = Auth::user();
        if ($user)
        {
            
            $query = new ParseQuery("Transaction");
            $query->limit(1000);
            //only Get results from that sponsor 
            $query->equalTo("sponsor", $user->sponsor);
            $query->equalTo("deployment", env("DEPLOYMENT"));
            $query->equalTo("used", false);
            // dd($query->find());
            $data = $query->find();
            return View::make('manage.unused',$data )->with( 'data', $data) ;//)->with($query->find());

        }
        else{
            return Redirect::to('login');
        }
    }




    public function showUsed()
    {
        $user = Auth::user();
        if ($user)
        {
            
            $query = new ParseQuery("Transaction");
            $query->limit(1000);
            //only Get results from that sponsor 
            $query->equalTo("sponsor", $user->sponsor);
            $query->equalTo("deployment", env("DEPLOYMENT"));
            $query->equalTo("used", true);

            $data = $query->find();
            return View::make('manage.used',$data )->with( 'data', $data) ;//)->with($query->find());

        }
        else{
            return Redirect::to('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function check()
    {
        $user = Auth::user();
        if ($user)
        {
            $input = Input::all();
            $query = new ParseQuery("Transaction");
            $object = $query->get($input["id"]);

            $object->set("used", true);
            $object->save();

        }
        else{
            return Redirect::to('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function uncheck(Request $request)
    {
        $user = Auth::user();
        if ($user)
        {
            $input = Input::all();
            $query = new ParseQuery("Transaction");
            $object = $query->get($input["id"]);

            $object->set("used", false);
            $object->save();

        }
        else{
            return Redirect::to('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function search()
    {
        $user = Auth::user();
        if ($user)
        {
            $input = Input::all();

            $used = $input['used'] == 'true' ? true : false;
            $search = $input['search'] ;

            $query = new ParseQuery("Transaction");
            $query->limit(1000);
            //only Get results from that sponsor 
            $query->equalTo("sponsor", $user->sponsor);
            $query->equalTo("deployment", env("DEPLOYMENT"));
            $query->equalTo("studentID", $search);


            $query->equalTo("used", $used);

            $data = $query->find();
            if ($used) {
                return View::make('manage.used',$data )->with( 'data', $data) ;//)->with($query->find());

            }
            elseif (condition) {
                return View::make('manage.unused',$data )->with( 'data', $data) ;//)->with($query->find());

            }
            
        }
        else{
            return Redirect::to('login');
        }    }

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
