<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:categories-list', ['only' => ['index','list']]);
        $this->middleware('permission:categories-create', ['only' => ['create','store']]);
        $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:categories-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:categories-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.categories.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('categories-view'))
                        {
                            $view = '<a href="'.route('backend.categories.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }                        
                        if(auth()->user()->can('categories-edit'))
                        {
                            $edit = '<a href="'.route('backend.categories.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }                        
                        if(auth()->user()->can('categories-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.categories.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('type', function(Category $row) {
                        $btn = '';
                        if($row->type == '1'){
                            $btn .= '<span class="badge badge-pill badge-secondary">Blogs</span>';
                        }
                        if($row->type == '2'){
                            $btn .= '<span class="badge badge-pill badge-secondary">Portfolio</span>';
                        }                        
                        if($row->type == '3'){
                            $btn .= '<span class="badge badge-pill badge-secondary">Services</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('status', function(Category $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Category $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Category $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['type','status','created_at','updated_at','actions'])
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
        return view('backend.categories.create');
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
            'status' => 'required',
        ]);
    
        Category::create($request->all());
     
        return redirect()->route('backend.categories.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $category = Category::find($id);
        // dd($category->toArray());
        return view('backend.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogTag  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',            
            'status' => 'required',
        ]);

        $category = Category::find($id);
        // dd($category->toArray());
    
        $category->update($request->all());
    
        return redirect()->route('backend.categories.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('backend.categories.index')
                        ->with('success','Category deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
    }
}
