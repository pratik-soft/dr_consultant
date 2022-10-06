<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dummy;
use App\Models\DummyFile;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class DummyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dummies-list', ['only' => ['index','list']]);
        $this->middleware('permission:dummies-create', ['only' => ['create','store']]);
        $this->middleware('permission:dummies-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:dummies-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:dummies-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        return view('backend.dummies.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Dummy::select('*')->withTrashed();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        return '<input type="checkbox" class="select_row" value="'.$row->id.'">';
                    })                    
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('dummies-view'))
                        {
                            $view = '<a href="'.route('backend.dummies.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('dummies-edit'))
                        {
                            $edit = '<a href="'.route('backend.dummies.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('dummies-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.dummies.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('created_at', function(Dummy $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Dummy $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->editColumn('deleted_at', function(Dummy $row) {
                        return getDatetimeHtml($row->deleted_at, 'danger');
                    })
                    ->editColumn('status', function(Dummy $row) {
                        return getDummyStatusHtml($row->status);                        
                    })
                    ->filter(function ($query) use ($request) {                                                
                        $deleted = $request->get('deleted');
                        if($deleted == ''){
                            // $query->withTrashed();
                        } else if($deleted == '1'){
                            $query->onlyTrashed();
                        } else if($deleted == '2'){
                            $query->where('deleted_at', NULL);
                        }

                        $status = $request->get('status');
                        if ($request->has('status') && $status!='') {
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
                        if ($deleted_at = $request->get('deleted_at'))
                        {
                            $deleted_at = explode(" - ",$deleted_at);                
                            $from_date = date('Y-m-d H:i:s',strtotime($deleted_at[0]));
                            $to_date = date('Y-m-d H:i:s',strtotime($deleted_at[1]));
                            $query->whereBetween('deleted_at', [$from_date, $to_date]);
                        }
                    }, true) //manual search with global search
                    // ->setRowClass(function ($row) {
                    //     return ($row->deleted_at) ? 'alert-danger' : '';
                    // })
                    ->setRowAttr([
                        'style' => function($row) {
                            return ($row->deleted_at) ? 'background-color:	#ffcccb ' : '';
                        },
                    ])
                    ->rawColumns(['checkbox','status','created_at','updated_at','deleted_at','actions'])
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
        return view('backend.dummies.create');
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
            'description' => 'required',
            'status' => 'required'
        ]);
            
        $insertData = $request->all();
        // dd($insertData);
        
        //upload file
        $fileName = '';
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/dummies'), $fileName);
        }
        
        $insertData['uuid'] =  Str::uuid();
        $insertData['featured'] =  ($request->get('featured') == 'on') ? '1' : '0';
        $insertData['image'] =  $fileName;             
        $dummy = Dummy::create($insertData);        

        foreach($request->file('files') as $file)
        {            
            $name = Str::random(10).'.'.$file->extension();
            $file->move(public_path('uploads/dummies/files'), $name);

            DummyFile::create([
                'dummy_id' => $dummy->id,
                'name' => $name
            ]);
        }
     
        return redirect()->route('backend.dummies.index')
                        ->with('success','Dummy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dummy = Dummy::with('files')->withTrashed()->find($id);        
        return view('backend.dummies.show',compact('dummy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dummy = Dummy::with('files')->withTrashed()->find($id);
        // dd($dummy->toArray());
        return view('backend.dummies.edit',compact('dummy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
            
        $updateData = $request->all();
        $dummy = Dummy::withTrashed()->find($id);
        // dd($dummy->toArray());

        $fileName = $dummy->image;
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/dummies'), $fileName);

            deleteFile(public_path('uploads/dummies').'/'.$dummy->image);
        }
        
        foreach($request->file('files') as $file)
        {            
            $name = Str::random(10).'.'.$file->extension();
            $file->move(public_path('uploads/dummies/files'), $name);

            DummyFile::create([
                'dummy_id' => $id,
                'name' => $name
            ]);
        }                
            
        $updateData['featured'] =  ($request->get('featured') == 'on') ? '1' : '0';
        $updateData['image'] =  $fileName; 
        $dummy->update($updateData);
    
        return redirect()->route('backend.dummies.index')
                        ->with('success','Dummy updated successfully');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Dummy  $dummy
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Dummy $dummy)
    // {
    //     $dummy->withTrashed()->delete();
    
    //     return redirect()->route('backend.dummies.index')
    //                     ->with('success','dummy deleted successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Dummy::withTrashed()->findOrFail($id);
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

        if($action_name == 'FORCE_DELETE')
        {
            Dummy::whereIn('id', $ids)->withTrashed()->forceDelete();
            $message = 'Record(s) permanently deleted successfully.';
        }
        
        if($action_name == 'DELETE')
        {
            Dummy::whereIn('id', $ids)->withTrashed()->delete();
            $message = 'Record(s) deleted successfully.';
        }

        if($action_name == 'RESTORE')
        {
            Dummy::whereIn('id', $ids)->withTrashed()->restore();
            $message = 'Record(s) restored successfully.';
        }

        if($action_name == 'ACTIVE')
        {
            Dummy::whereIn('id', $ids)->withTrashed()->update(['status' => '1']);
            $message = 'Record(s) activated successfully.';
        }

        if($action_name == 'INACTIVE')
        {
            Dummy::whereIn('id', $ids)->withTrashed()->update(['status' => '0']);
            $message = 'Record(s) inactivated successfully.';
        }
        
        return response()->json([ 'success' => '1', 'message' => $message]);
    }
}
