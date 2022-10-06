<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
class BlogController extends Controller
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
        $search = $request->get('search');
        // dd($search);

        $blogs = Blog::select('title','slug','content','image','posted_at')->where('status','PUBLISHED')->orderBy('posted_at', 'desc')->simplePaginate(5);
        // dd($blogs->toArray());
        if($search)
        {
            $blogs = Blog::select('title','slug','content','image','posted_at')            
            ->where(function ($query) use($search) {
                $query->where('title', 'like', '%'.$search.'%')
                      ->orWhere('content', 'like', '%'.$search.'%');
            })
            ->where('status','PUBLISHED')
            ->orderBy('posted_at', 'desc')
            ->simplePaginate(5);
        }

        return view('frontend.blog.index', compact('blogs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($slug, Request $request)
    {        
        $blog = Blog::with(['category','tags'])->where('slug',$slug)->where('status','PUBLISHED')->first();
        //dd($blog->toArray());

        return view('frontend.blog.detail', compact('blog'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug, Request $request)
    {
        $category = Category::select('id')->where('slug', $slug)->first();
        // dd($category->toArray());

        $blogs = Blog::select('title','slug','content','image','posted_at')->where('category_id', $category->id)->where('status','PUBLISHED')->orderBy('posted_at', 'desc')->simplePaginate(5);
        // dd($blogs->toArray());        

        return view('frontend.blog.index', compact('blogs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag($slug, Request $request)
    {
        $tag = Tag::select('id')->where('slug', $slug)->first();
        // dd($tag->toArray());
        $tag_id = $tag['id'];

        $blogs = Blog::with('tags')->whereHas('tags', function (Builder $query) use($tag_id) {
            $query->where('tags.id', $tag_id);
        })->where('blogs.status','PUBLISHED')->orderBy('blogs.posted_at', 'asc')->simplePaginate(5);
        // dd($blogs->toArray());        

        return view('frontend.blog.index', compact('blogs'));
    }
}
