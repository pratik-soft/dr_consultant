<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Testimonial;
use App\Models\Position;

class TestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:testimonial-list', ['only' => ['index','list']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:testimonial-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                  
        return view('backend.testimonials.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('testimonial-view'))
                        {
                            $view = '<a href="'.route('backend.testimonials.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('testimonial-edit'))
                        {
                            $edit = '<a href="'.route('backend.testimonials.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('testimonial-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.testimonials.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('photo', function(Testimonial $row) {
                        
                        $photo = '<img class="img-circle elevation-2" src="'.getTestimonialPhoto($row->photo).'" style="height:50px;width:50px">';
    
                        return $photo;
                    })
                    ->editColumn('status', function(Testimonial $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Testimonial $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Testimonial $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['photo','status','created_at','updated_at','actions'])
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
        $positions = Position::orderBy('name', 'asc')->pluck('name','id')->all();

        return view('backend.testimonials.create', compact('positions'));
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
            'fullname' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:2048',
            'review' => 'required',
            'position_id' => 'required',            
            'status' => 'required',
        ]);

        $fileName = '';
        if($request->hasFile('photo'))
        {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/testimonials'), $fileName);
        }
             
        $testimonial = Testimonial::create($request->all(), [ "photo" => $fileName ]);

        $testimonial->photo = $fileName;
        $testimonial->save();
     
        return redirect()->route('backend.testimonials.index')
                        ->with('success','Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('backend.testimonials.show',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $positions = Position::orderBy('name', 'asc')->pluck('name','id')->all();

        return view('backend.testimonials.edit',compact('testimonial','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'fullname' => 'required',            
            'review' => 'required',
            'position_id' => 'required',            
            'status' => 'required',
        ]);
        
        // dd($testimonial->toArray());

        $fileName = $testimonial->photo;
        if($request->hasFile('photo'))
        {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/testimonials'), $fileName);

            deleteFile(public_path('uploads/testimonials').'/'.$testimonial->photo);
        }

        $testimonial->fullname = $request->get('fullname');
        $testimonial->photo = $fileName;
        $testimonial->review = $request->get('review');
        $testimonial->position_id = $request->get('position_id');        
        $testimonial->status = $request->get('status');
        $testimonial->save();
    
        return redirect()->route('backend.testimonials.index')
                        ->with('success','Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
    
        return redirect()->route('backend.testimonials.index')
                        ->with('success','Testimonial deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Testimonial::findOrFail($id);
        $data->delete();
    }
}
