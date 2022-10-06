<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DataTables;
use DB;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list', ['only' => ['index','list']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:role-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {            
        return view('backend.roles.index');
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
            $data = Role::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()                    
                    ->addColumn('actions', function($row){
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('role-view'))
                        {
                            $view = '<a href="'.route('backend.roles.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('role-edit'))
                        {
                            $edit = '<a href="'.route('backend.roles.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }
                        
                        if(auth()->user()->can('role-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.roles.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('created_at', function(Role $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Role $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['created_at','updated_at','actions'])
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
        $permissions = Permission::select(['id','name'])->orderBy('name','asc')->get();
        return view('backend.roles.create',compact('permissions'));
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
            'name' => 'required|unique:roles,name',
            // 'permissions' => 'required',            
        ]);
    
        $role = Role::create($request->all());        
        $role->syncPermissions($request->input('permissions'));
     
        return redirect()->route('backend.roles.index')
                        ->with('success','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('backend.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::select(['id','name'])->orderBy('name','asc')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('backend.roles.edit',compact('role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);
    
        $role = Role::find($id);
        $role->update($request->all());
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('backend.roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
    
        return redirect()->route('backend.roles.index')
                        ->with('success','Role deleted successfully');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {                
        $data = Role::findOrFail($id);
        $data->delete();
    }
}
