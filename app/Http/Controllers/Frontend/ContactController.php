<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Mail;

class ContactController extends Controller
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
        return view('frontend.contact.index');
    }

    // Store Contact Form data
    public function contactAction(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=> 'required',
            'message' => 'required'
         ]);

        $request->merge([
            'read_status' => '0'
        ]);

        //  Store data in database
        Inquiry::create($request->all());

        $details = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ];
        
        \Mail::to('larademo@yopmail.com')->send(new \App\Mail\Contact($details));
        
        return response()->json([ 'success'=> 'We have received your message and would like to thanks for writing to us.']);        
    }
}
