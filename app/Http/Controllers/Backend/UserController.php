<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list', ['only' => ['index','list']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:user-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $roles = Role::pluck('name','name')->all();

        return view('backend.users.index',compact('roles'));
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
            $query = User::select('*');
            $datatables = Datatables::of($query);

            //advanced search
            if ($id = $request->get('id'))
            {
                $query->where('id', $id);
            }
            if ($name = $request->get('name'))
            {                
                $sql = "CONCAT(users.first_name,' ',users.last_name)  like ?";
                $query->whereRaw($sql, ["%{$name}%"]);
            }
            if ($email = $request->get('email'))
            {
                $query->where('email', 'like', "%{$email}%");
            }
            if ($roles = $request->get('roles'))
            {                
                $query->whereHas("roles", function($q) use($roles){ $q->whereIn("name", $roles); });
            }
            if ($status = $request->get('status'))
            {
                $query->where('status', $status);
            }
            if ($created_at = $request->get('created_at'))
            {
                $created_at = explode(" - ",$created_at);                
                $from_date = date('Y-m-d H:i:s',strtotime($created_at[0]));
                $to_date = date('Y-m-d H:i:s',strtotime($created_at[1]));
                $query->whereBetween('created_at', [$from_date, $to_date]);
            }
            if ($updated_at = $request->get('updated_at'))
            {
                $updated_at = explode(" - ",$updated_at);                
                $from_date = date('Y-m-d H:i:s',strtotime($updated_at[0]));
                $to_date = date('Y-m-d H:i:s',strtotime($updated_at[1]));
                $query->whereBetween('updated_at', [$from_date, $to_date]);
            }

            return $datatables->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        return '<input type="checkbox" class="select_row" value="'.$row->id.'">';
                    })
                    ->addColumn('avatar', function($row) {
                        
                        $avatar = '<img class="img-circle elevation-2" src="'.getUserThumb($row->photo).'" style="height:30px;width:30px">';
    
                        return $avatar;
                    })
                    ->addColumn('name', function($row){
                        return $row->first_name.' '.$row->last_name;
                    })
                    ->addColumn('roles', function($row){
                        $roles = '';
                        if(!empty($row->getRoleNames()))
                        {
                            foreach($row->getRoleNames() as $v)
                            {
                                $roles .= '<label class="badge badge-secondary mr-1">'.$v.'</label>';
                            }                            
                        }
    
                        return $roles;
                    })
                    ->addColumn('actions', function($row){                        

                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('user-view'))
                        {
                            $view = '<a href="'.route('backend.users.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('user-edit'))
                        {
                            $edit = '<a href="'.route('backend.users.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }
                        
                        if(auth()->user()->can('user-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.users.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('email', function(User $row) {
                        $email = '<a href="mailto:'.$row->email.'">'.$row->email.'</a>';
    
                        return $email;
                    })
                    ->editColumn('phone', function(User $row) {
                        $phone = '<a href="tel:'.$row->phone.'">'.$row->phone.'</a>';
    
                        return $phone;
                    })
                    ->editColumn('status', function(User $row) {
                        return getUserStatusHtml($row->status);                        
                    })
                    ->editColumn('created_at', function(User $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(User $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->filterColumn('name', function($query, $keyword) {
                        $sql = "CONCAT(users.first_name,' ',users.last_name)  like ?";
                        $query->whereRaw($sql, ["%{$keyword}%"]);
                    })
                    // ->filter(function ($query) use ($request) {
                    //     if ($request->has('name')) {                            
                    //         $sql = "CONCAT(users.first_name,' ',users.last_name)  like ?";
                    //         $query->whereRaw($sql, ["%{$request->get('name')}%"]);
                    //     }
        
                    //     if ($request->has('email')) {
                    //         $query->where('email', 'like', "%{$request->get('email')}%");
                    //     }
                    // })
                    ->rawColumns(['checkbox','avatar','email','phone','roles','status','created_at','updated_at','actions'])
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
        $roles = Role::pluck('name','name')->all();        
        $permissions = Permission::orderBy('name', 'asc')->get();
        $role_permissions_data = Role::with(['permissions'])->get();
        // dd($role_permissions_data->toArray());
        $role_permissions = array();
        foreach($role_permissions_data as $key=>$value)
        {            
            foreach($value->permissions as $key1=>$value1)
            {
                $role_permissions[$value->name][] = $value1->id;
            }            
        }
        // dd($role_permissions);
        return view('backend.users.create',compact('roles','permissions','role_permissions'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
            'roles' => 'required',
            'status' => 'required'
        ]);
    
        $user = User::create($request->all());

        //assign roles
        $user->assignRole($request->get('roles'));

        //sync permissions
        $user->syncPermissions($request->input('permissions'));

        $user->sendEmailVerificationNotification();
     
        return redirect()->route('backend.users.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['roles','permissions'])->find($id);        
        $user_roles = $user->getRoleNames()->toArray();
        $user_permissions = $user->getPermissionNames()->toArray();
        // dd($user->toArray());        
        // dd($user_roles);
        // dd($user_permissions);        
        $roles = Role::pluck('name','name')->all();
        $permissions = Permission::orderBy('name', 'asc')->get();

        $role_permissions_data = Role::with(['permissions'])->get();
        // dd($role_permissions_data->toArray());
        $role_permissions = array();
        foreach($role_permissions_data as $key=>$value)
        {            
            foreach($value->permissions as $key1=>$value1)
            {
                $role_permissions[$value->name][] = $value1->id;
            }            
        }
        // dd($role_permissions);

        return view('backend.users.edit',compact('user','user_roles','user_permissions','roles','permissions','role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'phone' => 'required',
            // 'password' => 'required',
            'roles' => 'required',
            'status' => 'required'
        ]);
    
        $user->update($request->all());

        //sync user roles and permissions
        $user->syncRoles($request->get('roles'));
        $user->syncPermissions($request->input('permissions'));
    
        return redirect()->route('backend.users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('backend.users.index')
                        ->with('success','User deleted successfully');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {                
        $data = User::findOrFail($id);
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
            User::whereIn('id', $ids)->delete();
            $message = 'Record(s) deleted successfully.';
        }

        if($action_name == 'ACTIVE')
        {
            User::whereIn('id', $ids)->update(['status' => '1']);
            $message = 'Record(s) activated successfully.';
        }

        if($action_name == 'INACTIVE')
        {
            User::whereIn('id', $ids)->update(['status' => '2']);
            $message = 'Record(s) inactivated successfully.';
        }

        if($action_name == 'BLOCK')
        {
            User::whereIn('id', $ids)->update(['status' => '4']);
            $message = 'Record(s) blocked successfully.';
        }
        
        return response()->json([ 'success' => '1', 'message' => $message]);
    }
}
