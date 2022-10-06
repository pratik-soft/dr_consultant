<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use DataTables;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:services-list', ['only' => ['index','list']]);
        $this->middleware('permission:services-create', ['only' => ['create','store']]);
        $this->middleware('permission:services-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:services-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:services-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                      
        return view('backend.services.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::select('*')->with(['category']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('services-view'))
                        {
                            $view = '<a href="'.route('backend.services.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        if(auth()->user()->can('services-edit'))
                        {
                            $edit = '<a href="'.route('backend.services.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }
                        if(auth()->user()->can('services-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.services.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('status', function(Service $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0' || $row->status == ''){
                            $btn .= '<span class="badge badge-pill badge-danger">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('featured', function(Service $row) {
                        $btn = '';
                        if($row->featured == '1'){
                            $btn .= '<span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span>';
                        }
                        if($row->featured == '0'){
                            $btn .= '<span class="badge badge-pill badge-danger"><i class="fa fa-times"></i></span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Service $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Service $row) {
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
        $categories = Category::orderBy('name', 'asc')->where('type','3')->where('status','1')->pluck('name','id')->all();
        $tags = Tag::orderBy('name', 'asc')->where('type','3')->where('status','1')->pluck('name','id')->all();
        // dd($categories);
        // dd($tags);
        return view('backend.services.create',compact('categories','tags'));
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
            $request->image->move(public_path('uploads/services'), $fileName);
        }

        $request->merge([
            'featured' => ($request->get('featured') == 'on') ? '1' : '0'
        ]);
             
        $service = Service::create($request->all(), [ "image" => $fileName ]);

        $service->image = $fileName;
        $service->save();

        $service->tags()->attach($request->get('tags'));
     
        return redirect()->route('backend.services.index')
                        ->with('success','Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $service = Service::with(['category','tags'])->find($id);
        // dd($service->toArray());
        return view('backend.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $categories = Category::orderBy('name', 'asc')->where('type','3')->where('status','1')->pluck('name','id')->all();
        $tags = Tag::orderBy('name', 'asc')->where('type','3')->where('status','1')->pluck('name','id')->all();
        // dd($categories);
        // dd($tags);
        return view('backend.services.edit',compact('service','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
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

        // dd($_REQUEST);
        // dd($request->category);
        $service = Service::find($id);
        // dd($service->toArray());

        $fileName = $service->image;
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/services'), $fileName);

            deleteFile(public_path('uploads/services').'/'.$service->image);
        }

        $request->merge([
            'featured' => ($request->get('featured') == 'on') ? '1' : '0',
            'blog_category_id' => $request->get('category')
        ]);
    
        $service->update($request->all());

        $service->image = $fileName;
        $service->save();

        //sync and update service tags
        $service->tags()->sync($request->get('tags'));
    
        return redirect()->route('backend.services.index')
                        ->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
    
        return redirect()->route('backend.services.index')
                        ->with('success','Service deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();
    }
}
