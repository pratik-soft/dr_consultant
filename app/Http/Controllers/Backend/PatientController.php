<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Patient;
use App\Models\User;
use App\Models\Position;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:patient-list', ['only' => ['index','list']]);
        $this->middleware('permission:patient-create', ['only' => ['create','store']]);
        $this->middleware('permission:patient-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:patient-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:patient-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                  
        return view('backend.patient.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::findByName('Patient')->toArray();
            $data = User::select('users.*')->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->where('model_has_roles.role_id',$roles['id']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('patient-view'))
                        {
                            $view = '<a href="'.route('backend.patient.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('patient-edit'))
                        {
                            $edit = '<a href="'.route('backend.patient.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('patient-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.patient.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
                        }

                        $symptoms_form = '<a href="'.route('backend.form.create').'/'.$row->id.'" class="dropdown-item edit btn btn-primary"><i class="fas fa-user"></i> Add Symptoms Form</a> ';
                        $assessment_form = '<a href="'.route('backend.assessmentform.create').'/'.$row->id.'" class="dropdown-item edit btn btn-primary"><i class="fas fa-check"></i> Add Assessment Form</a> ';

                        $btn = '<div class="dropdown">
                            <button role="button" type="button" class="btn btn-sm btn-circle btn-ripple" data-toggle="dropdown"> 
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            '.$view.'
                            '.$edit.'
                            '.$delete.'
                            '.$symptoms_form.'
                            '.$assessment_form.'
                            </div>
                        </div>';
    
                        return $btn;
                    })
                   
                    ->editColumn('status', function(User $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(User $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(User $row) {
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
        $patient = Patient::orderBy('first_name', 'asc')->pluck('first_name','patient_id')->all();

        return view('backend.patient.create', compact('patient'));
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
            'email' => 'unique:patients',            
            'contact_number' => 'required',            
            'status' => 'required'
        ]);
             
        $patient = Patient::create($request->all());
        $patient->save();
     
        return redirect()->route('backend.patient.index')
                        ->with('success','Patient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('backend.patient.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        // echo "<pre>";
        // print_r($patient);
        // die();
        $positions = Patient::orderBy('first_name', 'asc')->pluck('first_name','patient_id')->all();
        
        return view('backend.patient.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
       
        $request->validate([
            'first_namw' => 'required',            
            'patient_id' => 'required',            
            'status' => 'required'
        ]);
        
        // dd($patient->toArray());

        $fileName = $patient->photo;
        if($request->hasFile('photo'))
        {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/patient'), $fileName);
            
            deleteFile(public_path('uploads/patient').'/'.$patient->photo);
        }

        $patient->fullname = $request->get('fullname');
        $patient->position_id = $request->get('position_id');
        $patient->photo = $fileName;
        $patient->status = $request->get('status');
        $patient->save();
    
        return redirect()->route('backend.patient.index')
                        ->with('success','Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
    
        return redirect()->route('backend.patient.index')
                        ->with('success','Patient deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Patient::findOrFail($id);
        $data->delete();
    }
}
