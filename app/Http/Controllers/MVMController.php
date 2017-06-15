<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MVM;

class MVMController extends Controller
{
    //
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$mvm = MVM::all();
    	return view('admin.mvm.index', [
    		'mvm' => $mvm
    	]);
    }

    //Edit page
    public function edit($id){
    	$mvm = MVM::findOrFail($id);
    	return view('admin.mvm.edit', [
    		'mvm' => $mvm
    	]);
    }

    //Function to update Message, visiion and message
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
	        'mission' => 'required',
	        'vision' => 'required',
	        'message' => 'required',
	    ]);
    	$mvm = MVM::findOrFail($id);
    	$mvm->update($request->all());
    	\Session::flash('flash_msg','Misson, vision and message have been successfully updated!');
        return redirect('/admin/mvm/');
    }


    //Function to delete Message, visiion and message
    // public function destroy($id){
    // 	$mvm = MVM::findOrFail($id);
    // 	$mvm->delete();
    // 	\Session::flash('flash_msg','Misson, vision and message have been successfully deleted!');
    //     return redirect('/admin/mvm/');

    // }
}
