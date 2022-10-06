<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DataTables;
use DB;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:permission-list', ['only' => ['index','list']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:permission-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.permissions.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax())
        {
            $data = Permission::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()                    
                    ->addColumn('checkbox', function($row){
                        return '<input type="checkbox" class="select_row" value="'.$row->id.'">';
                    })
                    ->addColumn('actions', function($row){
                        $view = '';
                        $edit = '';
                        $delete = '';
                        
                        if(auth()->user()->can('permission-view'))
                        {
                            $view = '<a href="'.route('backend.permissions.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        if(auth()->user()->can('permission-edit'))
                        {
                            $edit = '<a href="'.route('backend.permissions.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }
                        if(auth()->user()->can('permission-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.permissions.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('created_at', function(Permission $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Permission $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })                    
                    ->rawColumns(['checkbox','created_at','updated_at','actions'])
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
        $permission = Permission::get();
        return view('backend.permissions.create',compact('permission'));
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
            'name' => 'required|unique:permissions,name',                        
        ]);
    
        $permission = Permission::create($request->all());
     
        return redirect()->route('backend.permissions.index')
                        ->with('success','Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('backend.permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('backend.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);
    
        $permission = Permission::find($id);
        $permission->update($request->all());        
    
        return redirect()->route('backend.permissions.index')
                        ->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
    
        return redirect()->route('backend.permissions.index')
                        ->with('success','Permission deleted successfully');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {                
        $data = Permission::findOrFail($id);
        $data->delete();
    }

    /**
     * Apply actions.
     *
     * @return \Illuminate\Http\Response
     */
    public function actions(Request $request)
    {
        $this->validate($request, [
            'action_name' => 'required',
            'ids' => 'required'            
        ]);

        $action_name = $request->get('action_name');
        $ids = $request->get('ids');        
        $message = '';
        
        if($action_name == 'DELETE')
        {
            Permission::whereIn('id', $ids)->delete();
            $message = 'Record(s) deleted successfully.';
        }
        
        return response()->json([ 'success' => '1', 'message' => $message]);
    }
}
