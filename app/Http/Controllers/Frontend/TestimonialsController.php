<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialsController extends Controller
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
        // $testimonials = Testimonial::
        //     // with('position:name')
        //     with(['position' => function($query) {
        //         $query->select(['name']);
        //     }])
        //     // ->where('status','1')
        //     ->get();

        $testimonials = Testimonial::with(['position'])->where('status','1')->get();
        // dd($testimonials->toArray());

        return view('frontend.testimonials.index',compact('testimonials'));
    }
}
