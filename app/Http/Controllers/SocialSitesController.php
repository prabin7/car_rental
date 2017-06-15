<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialSites;

class SocialSitesController extends Controller
{
    //
     //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$socialSites = SocialSites::all();
    	return view('admin.socialSites.index', [
    		'socialSites' => $socialSites
    	]);
    }

    //Create page
    public function create(){
        return view('admin.socialSites.create');
    }

    //Function to store socialSites in database
    public function store(Request $request){
        //Validation
        $this->validate($request, [
            'icon' => 'required',
            'title' => 'required',
            'link' => 'required',
        ]);
        $socialSites = SocialSites::create($request->all());
        \Session::flash('flash_msg','Social Sites has been successfully added!');
        return redirect('/admin/socialSites/');
    }

    //Edit page
    public function edit($id){
    	$socialSites = SocialSites::findOrFail($id);
    	return view('admin.socialSites.edit', [
    		'socialSites' => $socialSites
    	]);
    }

    //Function to update socialSites
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
            'icon' => 'required',
            'title' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
    	$socialSites = SocialSites::findOrFail($id);
    	$socialSites->update($request->all());
    	\Session::flash('flash_msg','Social Sites has been successfully updated!');
        return redirect('/admin/socialSites/');
    }


    //Function to delete socialSites
    public function destroy($id){
    	$socialSites = SocialSites::findOrFail($id);
    	$socialSites->delete();
    	\Session::flash('flash_msg','Social Sites has been successfully deleted!');
        return redirect('/admin/socialSites/');

    }
}
