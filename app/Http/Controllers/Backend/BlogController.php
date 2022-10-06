<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use DataTables;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:blog-list', ['only' => ['index','list']]);
        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:blog-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                      
        return view('backend.blog.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::select('*')->with(['category']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('blog-view'))
                        {
                            $view = '<a href="'.route('backend.blog.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        if(auth()->user()->can('blog-edit'))
                        {
                            $edit = '<a href="'.route('backend.blog.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }
                        if(auth()->user()->can('blog-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.blog.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
                        }

                        $btn = '<div class="dropdown">
                            <button role="button" type="button" class="btn btn-sm btn-circle btn-ripple" data-toggle="dropdown"> 
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            '.$view.'
                            '.$edit.'
                            '.$delete.'                          
                            </div>
                        </div>';
    
                        return $btn;
                    })
                    ->addColumn('tags', function ($row) {
                        return implode(', ', $row->tags->pluck('name')->toArray());
                    })
                    ->editColumn('status', function(Blog $row) {
                        $btn = '';
                        if($row->status == 'PUBLISHED'){
                            $btn .= '<span class="badge badge-pill badge-success">PUBLISHED</span>';
                        }
                        if($row->status == 'DRAFT'){
                            $btn .= '<span class="badge badge-pill badge-danger">DRAFT</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('featured', function(Blog $row) {
                        $btn = '';
                        if($row->featured == '1'){
                            $btn .= '<span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span>';
                        }
                        if($row->featured == '0'){
                            $btn .= '<span class="badge badge-pill badge-danger"><i class="fa fa-times"></i></span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Blog $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Blog $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['tags','created_at','updated_at','actions', 'status', 'featured'])
                    ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type','1')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        $tags = Tag::where('type','1')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        // dd($categories);
        // dd($tags);
        return view('backend.blog.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);
        
        // dd($request->all());

        $fileName = '';
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blog'), $fileName);
        }

        $request->merge([
            'featured' => ($request->get('featured') == 'on') ? '1' : '0'
        ]);
             
        $blog = Blog::create($request->all(), [ "image" => $fileName ]);

        $blog->image = $fileName;
        $blog->save();

        $blog->tags()->attach($request->get('tags'));
     
        return redirect()->route('backend.blog.index')
                        ->with('success','Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $blog = Blog::with(['category','tags'])->find($id);
        // dd($blog->toArray());
        return view('backend.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::where('type','1')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        $tags = Tag::where('type','1')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        // dd($categories);
        // dd($tags);
        return view('backend.blog.edit',compact('blog','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            //'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        // dd($request->category);
        $blog = Blog::find($id);
        // dd($blog->toArray());

        $fileName = $blog->image;
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blog'), $fileName);

            deleteFile(public_path('uploads/blog').'/'.$blog->image);
        }

        $request->merge([
            'featured' => ($request->get('featured') == 'on') ? '1' : '0',
            'blog_category_id' => $request->get('category')
        ]);
    
        $blog->update($request->all());

        $blog->image = $fileName;
        $blog->save();

        //sync and update blog tags
        $blog->tags()->sync($request->get('tags'));
    
        return redirect()->route('backend.blog.index')
                        ->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
    
        return redirect()->route('backend.blog.index')
                        ->with('success','Blog deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Blog::findOrFail($id);
        $data->delete();
    }
}
