<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$event = Event::all();
    	return view('admin.event.index', [
    		'event' => $event
    	]);
    }

    //Create page
    public function create(){
    	return view('admin.event.create');
    }

    //Function to store event in database
    public function store(Request $request){
    	//Validation
    	$this->validate($request, [
	        'image_name' => 'required',
	        'title' => 'required',
	        'description' => 'required',
	        'date' => 'required',
	        'time' => 'required',
	        'location' => 'required',
	    ]);
    	//Check if there is image or not
	    if ($request->hasFile('image_name')) {
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $finalImageName  = time() . '.' . $imageName;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/event/';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $event = Event::create($data);
            \Session::flash('flash_msg','Event has been successfully added!');
            return redirect('/admin/event/');
        }else{
            \Session::flash('flash_msg','Please upload the image!');
            return redirect('/admin/event/');
        }

    }

    //Edit page
    public function edit($id){
    	$event = Event::findOrFail($id);
    	return view('admin.event.edit', [
    		'event' => $event
    	]);
    }

    //Function to updat slider
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
	        'status' => 'required',
	        'title' => 'required',
	        'description' => 'required',
	        'date' => 'required',
	        'time' => 'required',
	        'location' => 'required',
	    ]);
    	$event = Event::findOrFail($id);

    	if ($request->hasFile('image_name')) {
    		//Check if old image exiss and delete the old image from the folder
            $oldImage=base_path('/public/uploads/event/'.$request->old_image_name);
            if (file_exists($oldImage)){
                unlink($oldImage);
            }
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $finalImageName  = time() . '.' . $imageName;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/event/';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $event->update($data);
            \Session::flash('flash_msg','Event has been successfully updated!');
            return redirect('/admin/event/');
        }else{
            $data = $request->all();
            $event->update($data);
            \Session::flash('flash_msg','Event has been successfully updated!');
            return redirect('/admin/event/');
        }

    }


    // //Function to delete slider
    public function destroy($id){
        $event = Event::findOrFail($id);
        $myfile = base_path('/public/uploads/event/'.$event->image_name);
        if (file_exists($myfile)){
            unlink($myfile);
            $event->delete();
            \Session::flash('flash_msg','Event has been successfully deleted!');
            return redirect('/admin/event/');  
        }else{
            $slider->delete();
            \Session::flash('flash_msg','Event has been successfully deleted!');
            return redirect('/admin/event/');
        }

    }
}
