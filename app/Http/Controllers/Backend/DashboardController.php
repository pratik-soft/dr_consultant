<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Inquiry;
use App\Models\Subscriber;
use App\Models\User;
use Auth;
class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $team_count = Team::count();
        // dd($team_count);

        $testimonials_count = Testimonial::count();
        // dd($testimonials_count);

        $clients_count = Client::count();
        // dd($clients_count);

        $services_count = Service::count();
        // dd($services_count);

        $blogs_count = Blog::count();
        // dd($blogs_count);

        $inquiries_count = Inquiry::count();
        // dd($inquiries_count);

        $subscribers_count = Subscriber::count();
        // dd($subscribers_count);

        $users_count = User::count();
        // dd($users_count);

        $user = Auth::user();

        // dd($user->hasRole('Patient'));

        return view('backend.dashboard.index',compact('team_count','testimonials_count','clients_count','services_count','blogs_count','inquiries_count','subscribers_count','users_count','user'));
    }
}
