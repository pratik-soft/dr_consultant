<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Mail;

class SubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    // Store Subcribe Form data
    public function subscriberAction(Request $request)
    {        
        // Form validation
        $this->validate($request, [            
            'email' => 'required|unique:subscribers',            
        ]);

        $verified_code = generateRandomString();

        $request->merge([
            'verified_code' => $verified_code
        ]);

        //  Store data in database
        Subscriber::create($request->all());

        $details = [            
            'email' => $request->get('email'),
            'verified_code' => $verified_code            
        ];
        
        \Mail::to('larademo@yopmail.com')->send(new \App\Mail\Subscriber($details));
        
        return response()->json([ 'success'=> 'Thanks for subscription.']);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function verify($verified_code)
    {
        $subscriber = Subscriber::where('verified_code', '=', $verified_code)->firstOrFail();
        if($subscriber->verified != '1')
        {
            $subscriber->update(['verified'=>'1']);
            return redirect()->route('home')
                        ->with('success','Your subscription email verified successfully.');
        }

        if($subscriber->verified == '1')
        {            
            return redirect()->route('home')
                        ->with('info','Your subscription email already verified.');
        }        
    }
}
