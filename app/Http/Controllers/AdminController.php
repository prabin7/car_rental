<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use App\ContactMessage;
use DB;

class AdminController extends Controller
{
    
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard(){
    	return view('admin/dashboard');
    }

    public function profile(){
    	$id =Auth::user()->id;
    	$user = User::findOrFail($id);
    	return view('admin/profile/profile', [
    		'user' => $user,
    	]);
    }

    public function editProfile(){
    	$id =Auth::user()->id;
    	$user = User::findOrFail($id);
    	return view('admin/profile/editProfile', [
    		'user' => $user,
    	]);
    }

    public function updateProfile(Request $request){
    	$id =Auth::user()->id;
    	$user = User::findOrFail($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->update();
    	\Session::flash('flash_msg','Profile successfully updated!');
    	return view('admin/profile/profile', [
    		'user' => $user
    	]);
    }

    public function changePassword(){
    	$id =Auth::user()->id;
    	$user = User::findOrFail($id);
    	return view('admin/profile/changePassword');
    }


	public function updatePassword(Request $request){
		//Validation
    	$this->validate($request, [
	        'old_password' => 'required|min:5',
	        'new_password' => 'required|min:5',
	        'confirm_password' => 'required|min:5',
	    ]);
	    $id =Auth::user()->id;
    	$user = User::findOrFail($id);
	    $oldPassword = $request->old_password;
	    $newPassword = \Hash::make($request->new_password);
		$password =Auth::user()->password;
		if (Hash::check($oldPassword, $password)) { //old pw , db pw
		    // The passwords match...
		    $user->password = $newPassword;
		    $user->update();
		    \Session::flash('flash_msg','Password successfully updated!');
	    	return view('admin/profile/profile', [
	    		'user' => $user
	    	]);
		}else{
			\Session::flash('flash_msg','Old password did not match!');
	    	return view('admin/profile/profile', [
	    		'user' => $user
	    	]);
		}
    }


    public function mailbox(){
        // $msg = ContactMessage::all();
        $msg = DB::table('contact_message')->orderBy('id', 'desc')->paginate(10);
        return view('admin.mailbox.index',[
            'msg' => $msg,
        ]);
    }

    public function readMail($id){
        $msg = ContactMessage::findOrFail($id);
        return view('admin.mailbox.show',[
            'msg' => $msg,
        ]);
    }
}
