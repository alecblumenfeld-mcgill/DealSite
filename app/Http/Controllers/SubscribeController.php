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

use View;



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
 
    public function purchase()
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
        $object->set("name", $input['email']);
        $object->set("email", $input['stripeEmail']);
        $object->set("studentID", $input['IdNumber']);
        $object->set("sponsor", $input['sponsor']);
        $object->set("stripeToken", $input['stripeToken']);
        $object->set("used", false);
        $object->set("deal", env($input['sponsor']."_DEAL_TITLE"));
        $object->set("deployment", env('DEPLOYMENT'));
        $object->set("experation", env($input['sponsor']."_EXPIRATION"));
        // Save:
        $object->save();

        //data to pass
        $data = [
            "expirationdate" =>  env($input['sponsor']."_EXPIRATION"),
            "sponsorName" =>   env($input['sponsor']."_RETAILER"),
            "stripeOrderNumber" => $charge['id'],
            "price" => env($input['sponsor']."_PRICE"),
            "email" => $input['email'],
            "flag" =>  "true",
        ];

        $email = $input['stripeEmail'];

        Mail::send('email.billing', $data, function ($message)  use ($email) {
            $message->to($email)->subject('Thank you for Your Order');
        });

        return View::make('thanks',$data )->with( 'data', $data);

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