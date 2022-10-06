<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Portfolio;
class PortfolioController extends Controller
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
        $categories = Category::withCount('portfolios')->having('portfolios_count', '>', 0)->where('type','2')->where('status','1')->get();
        // dd($categories->toArray());

        $portfolios = Portfolio::with(['category'])->where('status','1')->get();        
        //dd($portfolios->toArray());

        return view('frontend.portfolio.index', compact('categories','portfolios'));
    }
}
