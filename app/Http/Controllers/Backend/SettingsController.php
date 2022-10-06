<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Valuestore\Valuestore;

class SettingsController extends Controller
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
        $pathToFile = public_path() . '/default/settings.json';
        $valuestore = Valuestore::make($pathToFile);
        $settings = $valuestore->all();
        // dd($settings);

        return view('backend.settings.index', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
        // dd($request);

        $pathToFile = public_path() . '/default/settings.json';
        $valuestore = Valuestore::make($pathToFile);
        // $valuestore->flush(); //delete settings.json file

        $settings = array();
        foreach ($request->except('_token') as $key => $value)
        {            
            // echo $key;
            // echo '---';
            // echo $value;
            // echo '<br>';            
            $settings[$key] = $value;
        }

        //logo        
        if($request->hasFile('site_logo'))
        {
            $fileName = 'logo'.'.'.$request->site_logo->extension();
            $request->site_logo->move(public_path('uploads'), $fileName);
            $settings['site_logo'] = $fileName;
        }

        //favicon        
        if($request->hasFile('favicon'))
        {
            $fileName = 'favicon'.'.'.$request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $fileName);
            $settings['favicon'] = $fileName;
        }

        $valuestore->put($settings);
                     
        return redirect()->route('backend.settings.index')
                        ->with('success','Settings saved successfully.');
    }
}
