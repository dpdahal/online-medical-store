<?php

namespace App\Http\Controllers\frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class CheckOutController extends FrontendController
{
    public function showCheckout(Request $request){
        if($request->isMethod('get')){
            return view('frontend.pages.checkout.check-out',$this->data);
        }

        if($request->isMethod('post')){


            try {
                Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

                $customer = Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                ));


                $charge = Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => 50000,
                    'currency' => 'usd'
                ));

                return 'success';
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }

        }

    }

    public function subscribe_process(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $user->newSubscription('main', 'bronze')->create($request->stripeToken);

            return 'Subscription successful, you get the course!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }
}
