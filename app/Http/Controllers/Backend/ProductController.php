<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:product-list', ['only' => ['index','list']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy','delete']]);
        $this->middleware('permission:product-view', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {              
        // session()->put('warning','This is warning');
        // session()->flash('success', 'This is success !!!');
        // session()->flash('error', 'This is error !!!');
        // session()->flash('warning', 'This is warning !!!');
        // session()->flash('info', 'This is information !!!');
        // session()->flush();
    
        return view('backend.products.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){                        
                        $view = '';
                        $edit = '';
                        $delete = '';

                        if(auth()->user()->can('product-view'))
                        {
                            $view = '<a href="'.route('backend.products.show',$row->id).'" class="dropdown-item edit btn btn-info"><i class="fas fa-eye"></i> View</a> ';
                        }
                        
                        if(auth()->user()->can('product-edit'))
                        {
                            $edit = '<a href="'.route('backend.products.edit',$row->id).'" class="dropdown-item edit btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> ';
                        }

                        if(auth()->user()->can('product-delete'))
                        {
                            $delete = '<a href="javascript:void(0)" url="'.route('backend.products.delete',$row->id).'" id="'.$row->id.'" onclick="deleteRow(this)" class="dropdown-item edit btn btn-danger"><i class="fas fa-trash"></i> Delete</a> ';
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
                    ->editColumn('created_at', function(Product $row) {
                        return getDatetimeHtml($row->created_at, 'success');
                    })
                    ->editColumn('updated_at', function(Product $row) {
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
        return view('backend.products.create');
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
            'detail' => 'required',
        ]);
    
        Product::create($request->all());
     
        return redirect()->route('backend.products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('backend.products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('backend.products.index')
                        ->with('success','Product deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {        
        $products = Product::all();
        
        return view('backend.products.datatable',compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laratable(Request $request)
    {
        $products = Product::latest()->paginate(10);

        // session()->put('warning','This is warning');
        // session()->flash('success', 'This is success !!!');
        // session()->flash('error', 'This is error !!!');
        // session()->flash('warning', 'This is warning !!!');
        // session()->flash('info', 'This is information !!!');
        // session()->flush();
    
        return view('backend.products.laratable',compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
    }
}
