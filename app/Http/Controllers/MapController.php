<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;

class MapController extends Controller
{
    //
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$map = Map::all();
    	return view('admin.map.index', [
    		'map' => $map
    	]);
    }

    //Edit page
    public function edit($id){
    	$map = Map::findOrFail($id);
    	return view('admin.map.edit', [
    		'map' => $map
    	]);
    }

    //Function to update Message, visiion and message
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
	        'latitude' => 'required',
	        'longitude' => 'required',
            'title' => 'required',
	    ]);
    	$map = Map::findOrFail($id);
    	$map->update($request->all());
    	\Session::flash('flash_msg','Map has been successfully updated!');
        return redirect('/admin/map/');
    }
}
