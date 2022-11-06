<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssessmentForm;
use App\Models\PatientSymptomsFormOption;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Lang;

class AssessmentFormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:form-list', ['only' => ['index','list']]);
        $this->middleware('permission:form-create', ['only' => ['create','store']]);
        $this->middleware('permission:form-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:form-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:form-view', ['only' => ['show']]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                  
        return view('backend.form.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Form::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('form-view'))
                        {
                            $view = '<a href="'.route('backend.form.show',$row->form_id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('form-edit'))
                        {
                            $edit = '<a href="'.route('backend.form.edit',$row->form_id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('form-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.form.delete',$row->form_id).'" id="'.$row->form_id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                   
                    ->editColumn('status', function(Form $row) {
                        $btn = '';
                        if($row->status == '1'){
                            $btn .= '<span class="badge badge-pill badge-success">Active</span>';
                        }
                        if($row->status == '0'){
                            $btn .= '<span class="badge badge-pill badge-warning">Inactive</span>';
                        }                        
    
                        return $btn;
                    })
                    ->editColumn('created_at', function(Form $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Form $row) {
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
    public function create($patient_id)
    {
  
        // $form = Lang::get('form');
        // $question = $form['question'];
        // echo "<pre>";
        // print_r($form['question']);
        // die();
        return view('backend.assessmentform.create',compact(array('patient_id')));
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
            'blood_sample' => 'required',
            'ecg' => 'required',
            'echocardiogram' => 'required',
            'cmr' => 'required',
            'holt' => 'required',
            'pacemaker' => 'required',
            'ett' => 'required',
            'computed_tomography' => 'required',
            'other' => 'required',
            'on_examination' => 'required',
            'blood_pressure' => 'required',
            'heart_rate' => 'required',
            'weight' => 'required',
            'plans' => 'required',
            'nota_bene' => 'required',
            'ask_about' => 'required',
            'main_diagnosis' => 'required',
            'md_tests' => 'required',
            'md_treatment' => 'required',
            'risk_strat' => 'required',
            'driving_dvla' => 'required',
            'anticoagulation' => 'required',
            'has_bled_score' => 'required',
            'icd' => 'required',
            'discharge' => 'required',
            'date_of_next_follow_up' => 'required',
            'genetics' => 'required',
            'bp_recorder' => 'required',
            'lipid' => 'required',
            'family_screening' => 'required',
            'chase' => 'required',
            'diagnosis_other' => 'required',
            'covid' => 'required',
            'dental_check' => 'required',
            'exercise' => 'required',
            'alcohol_smoking' => 'required',
            'dtf' => 'required',
            'dt' => 'required',
            'stop_ace_arb' => 'required',
            'stop_meds' => 'required',
            'ocp_card_preg_service' => 'required',
            'cmuk' => 'required',
            'bhf' => 'required',
            'red_flags' => 'required',
            'follow_up_mention' => 'required',
            'call_after_tests' => 'required',
            'time_of_follow_up' => 'required',
            'follow_up_mdt' => 'required',
            'follow_up_cc' => 'required',
            'follow_up_red_flags' => 'required',
        ]);
        $request->request->remove('_token');
        $request->request->add(['status' => '1']);
        // echo "<pre>";
        // print_r($request->all());
        // die();
        $form = AssessmentForm::create($request->all());
        $form->save();
     
        return redirect()->route('backend.patient.index')
                        ->with('success','Assessment form created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return view('backend.form.show',compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        // echo "<pre>";
        // print_r($form);
        // die();
        $positions = Form::orderBy('first_name', 'asc')->pluck('first_name','form_id')->all();
        
        return view('backend.form.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
       
        $request->validate([
            'first_namw' => 'required',            
            'form_id' => 'required',            
            'status' => 'required'
        ]);
        
        // dd($form->toArray());

        $fileName = $form->photo;
        if($request->hasFile('photo'))
        {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/form'), $fileName);
            
            deleteFile(public_path('uploads/form').'/'.$form->photo);
        }

        $form->fullname = $request->get('fullname');
        $form->position_id = $request->get('position_id');
        $form->photo = $fileName;
        $form->status = $request->get('status');
        $form->save();
    
        return redirect()->route('backend.form.index')
                        ->with('success','Form updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();
    
        return redirect()->route('backend.form.index')
                        ->with('success','Form deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Form::findOrFail($id);
        $data->delete();
    }
}
