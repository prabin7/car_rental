<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactDetails;

class ContactDetailsController extends Controller
{
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$contactDetails = ContactDetails::all();
    	return view('admin.contactDetails.index', [
    		'contactDetails' => $contactDetails
    	]);
    }

    //Edit page
    public function edit($id){
    	$contactDetails = ContactDetails::findOrFail($id);
    	return view('admin.contactDetails.edit', [
    		'contactDetails' => $contactDetails
    	]);
    }

    //Function to update Message, visiion and message
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
	        'office_address' => 'required',
	        'phone_no' => 'required',
	        'mobile_no' => 'required',
	        'email' => 'required',
	    ]);
    	$contactDetails = ContactDetails::findOrFail($id);
    	$contactDetails->update($request->all());
    	\Session::flash('flash_msg','contactDetails has been successfully updated!');
        return redirect('/admin/contactDetails/');
    }
    
}
