<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use DataTables;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:client-list', ['only' => ['index','list']]);
        $this->middleware('permission:client-create', ['only' => ['create','store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:client-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                  
        return view('backend.clients.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('client-view'))
                        {
                            $view = '<a href="'.route('backend.clients.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('client-edit'))
                        {
                            $edit = '<a href="'.route('backend.clients.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('client-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.clients.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('logo', function(Client $row) {
                        
                        $logo = '<img class="img-thumbnail" src="'.getClientImage($row->logo).'" style="height:50px">';
    
                        return $logo;
                    })
                    ->editColumn('status', function(Client $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Client $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Client $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['logo','status','created_at','updated_at','actions'])
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
        return view('backend.clients.create');
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
            'logo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required'
        ]);

        $fileName = '';
        if($request->hasFile('logo'))
        {
            $fileName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/clients'), $fileName);
        }
             
        $client = Client::create($request->all(), [ "logo" => $fileName ]);

        $client->logo = $fileName;
        $client->save();
     
        return redirect()->route('backend.clients.index')
                        ->with('success','Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('backend.clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('backend.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            // 'logo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required'
        ]);
            
        // dd($request->category);
        $client = Client::find($id);
        // dd($client->toArray());

        $fileName = $client->logo;
        if($request->hasFile('logo'))
        {
            $fileName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/clients'), $fileName);

            deleteFile(public_path('uploads/clients').'/'.$client->logo);
        }

        $client->logo = $fileName;
        $client->status = $request->get('status');
        $client->save();

        return redirect()->route('backend.clients.index')
                        ->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
    
        return redirect()->route('backend.clients.index')
                        ->with('success','Client deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Client::findOrFail($id);
        $data->delete();
    }
}
