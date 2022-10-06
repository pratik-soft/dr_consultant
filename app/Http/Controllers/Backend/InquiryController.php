<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use DataTables;

class InquiryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:inquiry-list', ['only' => ['index','list']]);        
        $this->middleware('permission:inquiry-delete', ['only' => ['destroy','delete']]);        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.inquiries.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Inquiry::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $delete = '';

                        if(auth()->user()->can('inquiry-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.inquiries.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
                        }

                        $btn = '<div class="dropdown">
                            <button role="button" type="button" class="btn btn-sm btn-circle btn-ripple" data-toggle="dropdown"> 
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            '.$delete.'                          
                            </div>
                        </div>';
    
                        return $btn;
                    })
                    ->editColumn('message', function(Inquiry $row) {
                        return '<a href="javascript:void(0)" onclick="readInquiryMessage(\''.$row->id.'\')">View</a>';
                    })
                    ->editColumn('email', function(Inquiry $row) {
                        $email = '<a href="mailto:'.$row->email.'">'.$row->email.'</a>';
    
                        return $email;
                    })
                    ->editColumn('phone', function(Inquiry $row) {
                        $phone = '<a href="tel:'.$row->phone.'">'.$row->phone.'</a>';
    
                        return $phone;
                    })
                    ->editColumn('created_at', function(Inquiry $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Inquiry $row) {
                        return getDatetimeHtml($row->updated_at, 'primary');
                    })
                    ->rawColumns(['message','email','phone','created_at','updated_at','actions'])
                    ->make(true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = BlogTag::findOrFail($id);
        $data->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {        
        $inquiry = Inquiry::find($id);
        if($inquiry->read_status != '1')
        {
            $inquiry->update(['read_status'=>'1']);
        }        
        // dd($inquiry->toArray());        
        return response()->json($inquiry);
    }
}
