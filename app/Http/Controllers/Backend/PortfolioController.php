<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use DataTables;

class PortfolioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:portfolio-list', ['only' => ['index','list']]);
        $this->middleware('permission:portfolio-create', ['only' => ['create','store']]);
        $this->middleware('permission:portfolio-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:portfolio-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:portfolio-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                      
        return view('backend.portfolio.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Portfolio::select('*')->with(['category']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('portfolio-view'))
                        {
                            $view = '<a href="'.route('backend.portfolio.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        if(auth()->user()->can('portfolio-edit'))
                        {
                            $edit = '<a href="'.route('backend.portfolio.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }
                        if(auth()->user()->can('portfolio-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.portfolio.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('status', function(Portfolio $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0' || $row->status == ''){
                            $btn .= '<span class="badge badge-pill badge-danger">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('featured', function(Portfolio $row) {
                        $btn = '';
                        if($row->featured == '1'){
                            $btn .= '<span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span>';
                        }
                        if($row->featured == '0'){
                            $btn .= '<span class="badge badge-pill badge-danger"><i class="fa fa-times"></i></span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Portfolio $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Portfolio $row) {
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
        $categories = Category::where('type','2')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        $tags = Tag::where('type','2')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        // dd($categories);
        // dd($tags);
        return view('backend.portfolio.create',compact('categories','tags'));
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
            'name' => 'required',
            'slug' => 'required',
            'detail' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);
        
        // dd($request->all());

        $fileName = '';
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/portfolio'), $fileName);
        }

        $request->merge([
            'featured' => ($request->get('featured') == 'on') ? '1' : '0'
        ]);
             
        $portfolio = Portfolio::create($request->all(), [ "image" => $fileName ]);

        $portfolio->image = $fileName;
        $portfolio->save();

        $portfolio->tags()->attach($request->get('tags'));
     
        return redirect()->route('backend.portfolio.index')
                        ->with('success','Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $portfolio = Portfolio::with(['category','tags'])->find($id);
        // dd($portfolio->toArray());
        return view('backend.portfolio.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        $categories = Category::where('type','2')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        $tags = Tag::where('type','2')->where('status','1')->orderBy('name', 'asc')->pluck('name','id')->all();
        // dd($categories);
        // dd($tags);
        // dd($portfolio->tags->pluck('id')->toArray());
        return view('backend.portfolio.edit',compact('portfolio','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'detail' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);

        // dd($request->category);
        $portfolio = Portfolio::find($id);
        // dd($portfolio->toArray());

        $fileName = $portfolio->image;
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/portfolio'), $fileName);

            deleteFile(public_path('uploads/portfolio').'/'.$portfolio->image);
        }

        $request->merge([
            'featured' => ($request->get('featured') == 'on') ? '1' : '0',
            'blog_category_id' => $request->get('category')
        ]);
    
        $portfolio->update($request->all());

        $portfolio->image = $fileName;
        $portfolio->save();

        $portfolio->tags()->sync($request->get('tags'));
    
        return redirect()->route('backend.portfolio.index')
                        ->with('success','Portfolio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
    
        return redirect()->route('backend.portfolio.index')
                        ->with('success','Portfolio deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Portfolio::findOrFail($id);
        $data->delete();
    }
}
