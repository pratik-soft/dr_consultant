<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Service;
use App\Models\Category;

class ServicesController extends Controller
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
        return view('frontend.services.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug, Request $request)
    {
        // dd($slug);
        // $services = 1;

        $category = Category::select('id')->where('type', '3')->where('slug', $slug)->first();
        // dd($category->toArray());

        $services = Service::select('name','slug','detail','image')->where('category_id', $category->id)->where('status','1')->orderBy('name', 'asc')->get();
        // dd($services->toArray());

        return view('frontend.services.category', compact('services'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($slug, Request $request)
    {        
        $service = Service::with(['category','tags'])->where('slug',$slug)->where('status','1')->first();
        // dd($service->toArray());

        return view('frontend.services.detail', compact('service'));
    }
}
