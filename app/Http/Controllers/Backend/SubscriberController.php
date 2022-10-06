<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use DataTables;

class SubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:subscriber-list', ['only' => ['index','list']]);
        $this->middleware('permission:subscriber-create', ['only' => ['create','store']]);
        $this->middleware('permission:subscriber-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subscriber-delete', ['only' => ['destroy','delete']]);        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.subscribers.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Subscriber::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $edit = '';
                        $delete = '';                        
                        
                        if(auth()->user()->can('subscriber-edit'))
                        {
                            $edit = '<a href="'.route('backend.subscribers.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('subscriber-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.subscribers.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
                        }

                        $btn = '<div class="dropdown">
                            <button role="button" type="button" class="btn btn-sm btn-circle btn-ripple" data-toggle="dropdown"> 
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">                            
                            '.$edit.'
                            '.$delete.'                          
                            </div>
                        </div>';
    
                        return $btn;
                    })
                    ->editColumn('verified', function(Subscriber $row) {
                        $verified = '';
                        
                        if($row->verified == '1'){
                            $verified .= '<label class="badge badge-success mr-1">Yes</label>';
                        } else {
                            $verified .= '<label class="badge badge-danger mr-1">No</label>';
                        }
                        
                        return $verified;                        
                    })
                    ->editColumn('created_at', function(Subscriber $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Subscriber $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['verified','created_at','updated_at','actions'])
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
        return view('backend.subscribers.create');
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
            'email' => 'required|unique:subscribers',
        ]);
    
        Subscriber::create($request->all());
     
        return redirect()->route('backend.subscribers.index')
                        ->with('success','Subscriber created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        return view('backend.subscribers.edit',compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $request->validate([
            'email' => 'required|unique:subscribers,email,'.$subscriber->id,
        ]);
    
        $subscriber->update($request->all());
    
        return redirect()->route('backend.subscribers.index')
                        ->with('success','Subscriber updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
    
        return redirect()->route('backend.subscribers.index')
                        ->with('success','Subscriber deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Subscriber::findOrFail($id);
        $data->delete();
    }
}
