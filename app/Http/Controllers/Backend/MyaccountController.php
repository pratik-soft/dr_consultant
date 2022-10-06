<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Rules\MatchOldPassword;
use Auth;
use Image;
use File;

class MyaccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {        
        $auth = Auth::user();
        // dd($auth->toArray());

        $user = User::with(['roles'])->find($auth->id);
        // dd($user->toArray());

        return view('backend.myaccount.index', compact('user'));
    }

    public function profile(Request $request)
    {        
        $auth = Auth::user();
        // dd($auth->toArray());

        $user = User::with(['roles'])->find($auth->id);
        // dd($user->toArray());

        return view('backend.myaccount.profile', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {
        $auth = Auth::user();
                
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,'.$auth->id,
        ]);

        $user = User::find($auth->id);
        $user->update($request->all());
    
        return redirect()->route('backend.myaccount.index')
                        ->with('success','Profile updated successfully');
    }

    public function change_password(Request $request)
    {                        
        return view('backend.myaccount.change_password');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function change_password_action(Request $request)
    {
        $auth = Auth::user();
                
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        User::find(auth()->user()->id)->update(['password'=> $request->new_password]);
    
        return redirect()->route('backend.myaccount.change_password')
                        ->with('success','Password changes successfully');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_avatar()
    {
        return view('backend.myaccount.change_avatar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_avatar_action(Request $request)
    {
        $auth = Auth::user();
        
        //upload new photo
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name = time().'.png';
        $path = public_path() . "/uploads/avatar/" . $image_name;
        if(!File::isDirectory(public_path() . "/uploads/avatar/")){
            File::makeDirectory(public_path() . "/uploads/avatar/", 0777, true, true);    
        }
        file_put_contents($path, $data);

        //generate new photo thumb
        $destinationPath = public_path('/uploads/avatar/thumb');
        if(!File::isDirectory($destinationPath)){
            File::makeDirectory($destinationPath, 0777, true, true);    
        }
        $img = Image::make($path);
        $img->resize(50, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);

        //update user new photo
        $user = User::find($auth->id);
        $user->photo = $image_name;
        $user->save();

        //delete old photo
        removePhoto($auth->photo);
                
        return response()->json(['success'=>'done']);
    }

    /**
     * Display a listing of the currently logged in devices.
     *
     * @return \Illuminate\Http\Response
     */
    public function logged_in_devices()
    {
        $devices = \DB::table('sessions')
            ->where('user_id', \Auth::user()->id)
            ->get()->reverse();

        return view('backend.myaccount.logged_in_devices')
                ->with('devices', $devices)
                ->with('current_session_id', \Session::getId());
    }

    /**
     * Logouts a user from all other devices except the current one.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout_all_devices(Request $request)
    {
        \DB::table('sessions')
            ->where('user_id', \Auth::user()->id)
            ->where('id', '!=', \Session::getId())->delete();

        return redirect()->route('backend.myaccount.logged_in_devices')
            ->with('success','All Devices removed successfully');
    }

    /**
     * Logout a session based on session id.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout_device(Request $request, $device_id)
    {
        \DB::table('sessions')
            ->where('id', $device_id)->delete();
        
        return redirect()->route('backend.myaccount.logged_in_devices')
                        ->with('success','Device removed successfully');
    }
}
