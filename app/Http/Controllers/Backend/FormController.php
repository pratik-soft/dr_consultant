<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\PatientSymptomsFormOption;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Lang;

class FormController extends Controller
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
        return view('backend.form.create',compact(array('patient_id')));
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
            'diagnoses' => 'required', 
            'past_medical_history' => 'required', 
            'other_symptoms' => 'required', 
            'central_nervous_system' => 'required', 
            'musculoskeletal' => 'required', 
            'gastrointestinal' => 'required', 
            'urogenital_symptoms' => 'required', 
            'skin' => 'required', 
            'gynae' => 'required', 
            'drug_allergies' => 'required', 
            'updates' => 'required', 
            'risk_factors_c' => 'required', 
            'family_history' => 'required', 
            'interventions' => 'required', 
            'new_tests' => 'required', 
        ]);
        $request->request->remove('_token');
        $request->request->add(['status' => '1']);
        // echo "<pre>";
        // print_r($request->all());
        // die();
        $form = Form::create($request->all());
        $form->save();

        $patient_symptoms_form_id = $form->id;
        $chest_pain_potion = array();
        $shortness_of_breath_potion = array();
        $coughing_potion = array();
        $exercise_potion = array();
        $medications_potion = array();

        if($request->chest_pain == 1){
            $chest_pain_potion = array(
                'pain_in_day'=>$request->pain_in_day,
                'feel_pain_place'=>$request->feel_pain_place,
                'chest_pain_d'=>$request->chest_pain_d,
                'chest_pain_e'=>$request->chest_pain_e,
                'chest_pain_f'=>$request->chest_pain_f,
                'chest_pain_g'=>$request->chest_pain_g,
            );
        }

        if($request->shortness_of_breath == 1){
            $shortness_of_breath_potion = array(
                'feel_sob'=>isset($request->feel_sob)?$request->feel_sob:'',
                'shortness_of_breath_b'=>$request->shortness_of_breath_b,
                'shortness_of_breath_c'=>$request->shortness_of_breath_c,
                'shortness_of_breath_d'=>$request->shortness_of_breath_d,
                'shortness_of_breath_e'=>$request->shortness_of_breath_e,
            );
        }

        if($request->coughing == 1){
            $coughing_potion = array(
                'coughing_time'=>isset($request->coughing_time)?$request->coughing_time:'',
            );
        }

        if($request->exercise == 1){
            $exercise_potion = array(
                'exercise_a'=>$request->exercise_a,
                'exercise_b'=>$request->exercise_b,
            );
        }

        if($request->medications == 1){
            $medications_potion = array(
                'medications_a'=>$request->medications_a,
                'medications_b'=>$request->medications_b,
                'medications_c'=>$request->medications_c,
                'medications_d'=>$request->medications_d,
                'medications_e'=>$request->medications_e,
                'medications_f'=>$request->medications_f,
            );
        }

        $option_data = array(
            'chest_pain_potion' => $chest_pain_potion,
            'shortness_of_breath_potion' => $shortness_of_breath_potion,
            'coughing_potion' => $coughing_potion,
            'exercise_potion' => $exercise_potion,
            'medications_potion' => $medications_potion
        );
        $save_data = array(
            'patient_symptoms_form_id' => $patient_symptoms_form_id,
            'patient_symptoms_option' => json_encode($option_data)
        );

        $patient_symptoms_option = PatientSymptomsFormOption::create($save_data);
        $patient_symptoms_option->save();
     
        return redirect()->route('backend.patient.index')
                        ->with('success','Symptoms form created successfully.');
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
