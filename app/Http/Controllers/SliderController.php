<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    //
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$slider = Slider::all();
    	return view('admin.slider.index', [
    		'slider' => $slider
    	]);
    }

    //Create page
    public function create(){
    	return view('admin.slider.create');
    }

    //Function to store slider in database
    public function store(Request $request){
    	//Validation
    	$this->validate($request, [
	        'image_name' => 'required',
	        'title' => 'required',
	        'position' => 'required',
	    ]);
    	//Check if there is image or not
	    if ($request->hasFile('image_name')) {
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $finalImageName  = time() . '.' . $imageName;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/slider';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $slider = Slider::create($data);
            \Session::flash('flash_msg','Slider has been successfully added!');
            return redirect('/admin/slider/');
        }else{
            \Session::flash('flash_msg','Please upload the image!');
            return redirect('/admin/slider/');
        }

    }

    //Edit page
    public function edit($id){
    	$slider = Slider::findOrFail($id);
    	return view('admin.slider.edit', [
    		'slider' => $slider
    	]);
    }

    //Function to updat slider
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
	        'status' => 'required',
	        'title' => 'required',
	        'position' => 'required',
	    ]);
    	$slider = Slider::findOrFail($id);

    	if ($request->hasFile('image_name')) {
    		//Check if old image exiss and delete the old image from the folder
            $oldImage=base_path('public/uploads/slider/'.$request->old_image_name);
            if (file_exists($oldImage)){
                unlink($oldImage);
            }
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $finalImageName  = time() . '.' . $imageName;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/slider';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $slider->update($data);
            \Session::flash('flash_msg','Slider has been successfully updated!');
            return redirect('/admin/slider/');
        }else{
            $data = $request->all();
            $slider->update($data);
            \Session::flash('flash_msg','Slider has been successfully updated!');
            return redirect('/admin/slider/');
        }

    }


    //Function to delete slider
    public function destroy($id){
        $slider = Slider::findOrFail($id);
        $myfile = public_path('public/uploads/slider/'.$slider->image_name);
        if (file_exists($myfile)){
            unlink($myfile);
            $slider->delete();
            \Session::flash('flash_msg','Slider has been successfully deleted!');
            return redirect('/admin/slider/');  
        }else{
            $slider->delete();
            \Session::flash('flash_msg','Slider has been successfully deleted!');
            return redirect('/admin/slider/');
        }

    }
}
