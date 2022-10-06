<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use DataTables;

class PositionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:position-list', ['only' => ['index','list']]);
        $this->middleware('permission:position-create', ['only' => ['create','store']]);
        $this->middleware('permission:position-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:position-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:position-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                  
        return view('backend.positions.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Position::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('position-view'))
                        {
                            $view = '<a href="'.route('backend.positions.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('position-edit'))
                        {
                            $edit = '<a href="'.route('backend.positions.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('position-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.positions.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('status', function(Position $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Position $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Position $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['status','created_at','updated_at','actions'])
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
        return view('backend.positions.create');
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
            'status' => 'required'
        ]);
    
        Position::create($request->all());
     
        return redirect()->route('backend.positions.index')
                        ->with('success','Position created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return view('backend.positions.show',compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('backend.positions.edit',compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required',            
            'status' => 'required'
        ]);
    
        $position->update($request->all());
    
        return redirect()->route('backend.positions.index')
                        ->with('success','Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
    
        return redirect()->route('backend.positions.index')
                        ->with('success','Position deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Position::findOrFail($id);
        $data->delete();
    }
}
