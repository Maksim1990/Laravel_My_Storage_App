<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Cache;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $plan=$user->subscription('main');
        //$user->subscription('main')->updateQuantity(10);

        return view('subscription.index', compact('user','plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());
        return view('subscription.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $user = User::find(Auth::id());
        $stripe_plan = $request['stripe_plan'];
        $creditCardToken = $request->stripeToken;
        if (!$user->subscription('main')) {
            if (!empty($stripe_plan)) {
                $res = $user->newSubscription('main', $stripe_plan)
                    ->trialDays(30)
                    ->create($creditCardToken, [
                        'plan' => $stripe_plan,
                        'email' => $user->email,

                    ]);

                //-- Get user's settings from cache or from DB
                $setting = Cache::remember('settings_' . $user->id, 22 * 60, function () use ($user) {
                    return Setting::where('user_id', $user->id)->first();
                });

                //-- Flush 'books' key from redis cache
                Cache::forget('settings_' . $user->id);

                if (isset($setting)) {
                    $setting->subscription_plan = $stripe_plan;
                    $setting->save();
                } else {
                    $input['user_id'] = Auth::id();
                    $input['subscription_plan'] = $stripe_plan;
                    Setting::create($input);
                }

                return redirect($locale.'/home');
            }
        } else {
            return back();
        }
//        if (!$user->subscription('main')) {
//
//                return view('subscription.index', compact('user'));
//            }else{
//                $info = "Please select any plan for subscription!";
//                return view('subscription.form', compact('user', 'info'));
//            }
//
//        } else {
//            $info = "You have already subscribed";
//            return view('subscription.index', compact('user', 'info'));
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function cancel()
    {
        $user = User::find(Auth::id());
        $locale = LaravelLocalization::getCurrentLocale();
        //-- If i want immediately stop subscription without ability to resume it again
//        $user->subscription('main')->cancelNow();
        $user->subscription('main')->cancel();

        return redirect('/'.$locale.'/plans');
    }

    public function resume()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $user = User::find(Auth::id());
        $user->subscription('main')->resume();

        return redirect('/'.$locale.'/plans');
    }

    public function change($plan)
    {
        $user = User::find(Auth::id());
        $locale = LaravelLocalization::getCurrentLocale();
//        $plan=$user->subscription('main');
//        if($plan->stripe_plan=='small'){
//            $plan="large";
//        }else{
//            $plan="small";
//        }
        $user->subscription('main')->swap($plan);
        
        
          //-- Get user's settings from cache or from DB
                $setting = Cache::remember('settings_' . $user->id, 22 * 60, function () use ($user) {
                    return Setting::where('user_id', $user->id)->first();
                });

                //-- Flush 'books' key from redis cache
                Cache::forget('settings_' . $user->id);

                if (isset($setting)) {
                    $setting->subscription_plan = $plan;
                    $setting->save();
                } else {
                    $input['user_id'] = Auth::id();
                    $input['subscription_plan'] = $plan;
                    Setting::create($input);
                }
        

        return redirect('/'.$locale.'/plans');
    }

    public function plans()
    {
        $user = User::find(Auth::id());
        $plan=$user->subscription('main');
        $title="Subscription plans";

        return view('plans.index', compact('title', 'plan'));
    }

}
