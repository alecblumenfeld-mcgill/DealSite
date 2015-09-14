<?php
 
 
namespace App\Http\Controllers;
 
 
use Illuminate\Routing\Controller;
use App\Plans;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


use Parse\ParseObject;




class SubscribeController extends Controller
{
 
    public function registerUser($input, $level)
    {
        if($user = User::where("email", $input['stripeEmail'])->first())
        {
            if($user->subscribed())
            {
                $user->subscription($level)->swap();
            }
            else
            {
                $user->subscription($level)->create($input['stripeToken']);
            }
        }
        else
        {
            $user = User::create(
                [
                    'email' => $input['stripeEmail'],
                    'password' => Hash::make(Str::random())
                ]
            );
 
            $user->subscription($level)->create($input['stripeToken']);
        }
 
        return $user;
    }
 
    public function getSponsorPage()
    {
        $public_key = env('STRIPE_PUBLIC');
        return view('stripe.subscribe', compact('public_key'));
    }
 
    public function post1Show()
    {
        $input = Input::all();
        $mailEmail = strpos($input['stripeEmail'], "mail.mcgill.ca");
        //send back if not a validStripe Token
        if(empty($input['stripeToken']))
            return Redirect::back();
        


        //Charge Customer  
        $charge = Stripe::charges()->create([
            'source' => $input['stripeToken'],
            'receipt_email'=> $input['stripeEmail'],
            'currency' => 'CAD',
            'amount'   => env($input['sponsor']."_PRICE"),
        ]);

        //Save to Parse
        $object = ParseObject::create("Transaction");
        $objectId = $object->getObjectId();

        // Set values:
        $object->set("name", $input['Name']);
        $object->set("email", $input['stripeEmail']);
        $object->set("studentID", $input['IdNumber']);
        $object->set("sponsor", $input['sponsor']);
        $object->set("stripeToken", $input['stripeToken']);

        $object->set("deployment", env('DEPLOYMENT'));

        

        // Save:
        $object->save();

        
       //CHECK FOR EMAIL, send success email

        //data to pass
        $data = [

            "deadline" =>  env($input['sponsor']."_DEADLINE"),
            "retailer" =>   env($input['sponsor']."_RETAILER"),
            "flag" =>  "true",
        ];
        //mail message
        Mail::send('email.thanks', $data, function ($message) {
            $message->to('alecblumenfeld@gmail.com');

        });

        return    Redirect::to('thanks')->with("data", $data);
    }
 
    public function post2Show()
    {
        $input = Input::all();
 
        if(empty($input['stripeToken']))
            return Redirect::back();
 
        $user = $this->registerUser($input, Plans::$TWO_SHOWS_A_MONTH);
 
        Auth::login($user);
 
        return Redirect::to('profile')->with("message", "Thanks!");
    }
 
    public function postFan()
    {
        $input = Input::all();
 
        if(empty($input['stripeToken']))
            return Redirect::back();
 
        $user = $this->registerUser($input, Plans::$FAN);
 
        Auth::login($user);
 
        return Redirect::to('profile')->with("message", "Thanks!");
    }
 
 
}