<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DummyFile;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class DummyFileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');        
        // $this->middleware('permission:dummies-delete', ['only' => ['destroy','delete']]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = DummyFile::findOrFail($id);
        $data->delete();

        deleteFile(public_path('uploads/dummies/files').'/'.$data->name);
    }
}
