<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Team;
use App\Models\Position;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:team-list', ['only' => ['index','list']]);
        $this->middleware('permission:team-create', ['only' => ['create','store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:team-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:team-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                  
        return view('backend.team.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Team::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('team-view'))
                        {
                            $view = '<a href="'.route('backend.team.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('team-edit'))
                        {
                            $edit = '<a href="'.route('backend.team.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('team-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.team.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('photo', function(Team $row) {
                        
                        $photo = '<img class="img-circle elevation-2" src="'.getTeamPhoto($row->photo).'" style="height:50px;width:50px">';
    
                        return $photo;
                    })
                    ->editColumn('status', function(Team $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Team $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Team $row) {
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

        return view('backend.team.create', compact('positions'));
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
            'position_id' => 'required',            
            'status' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = '';
        if($request->hasFile('photo'))
        {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/team'), $fileName);
        }
             
        $team = Team::create($request->all(), [ "photo" => $fileName ]);

        $team->photo = $fileName;
        $team->save();
     
        return redirect()->route('backend.team.index')
                        ->with('success','Team created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('backend.team.show',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $positions = Position::orderBy('name', 'asc')->pluck('name','id')->all();

        return view('backend.team.edit',compact('team','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'fullname' => 'required',            
            'position_id' => 'required',            
            'status' => 'required'
        ]);
        
        // dd($team->toArray());

        $fileName = $team->photo;
        if($request->hasFile('photo'))
        {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/team'), $fileName);
            
            deleteFile(public_path('uploads/team').'/'.$team->photo);
        }

        $team->fullname = $request->get('fullname');
        $team->position_id = $request->get('position_id');
        $team->photo = $fileName;
        $team->status = $request->get('status');
        $team->save();
    
        return redirect()->route('backend.team.index')
                        ->with('success','Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
    
        return redirect()->route('backend.team.index')
                        ->with('success','Team deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Team::findOrFail($id);
        $data->delete();
    }
}
