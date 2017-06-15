<?php

namespace App\Http\Controllers;
use App\Program;
use App\ProgramGallery;
use Response;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$program = Program::all();
    	return view('admin.program.index', [
    		'program' => $program
    	]);
    }

    //Create page
    public function create(){
    	return view('admin.program.create');
    }

    //Function to store logo in database
    public function apc_store(key, var)(Request $request){
    	//Validation
    	$this->validate($request, [
	        'image_name' => 'required',
	        'title' => 'required',
	        'description' => 'required',
	    ]);
	 	

	    if ($request->hasFile('image_name')) {
	    	$program = new Program();
		    $program->title = $request->title;
		    $program->description = $request->description;
		    $program->save();

	    	$files = \Input::file('image_name');
		    $output = "";
		    foreach ($files as $file) {
		    	//Get the tmp and orginal name of image
		    	$imageName = $file->getClientOriginalName();
		    	$finalImageName  = time() . '.' . $imageName;
		        $output .= $file->getClientOriginalName();
		        $path = base_path() . '/public/uploads/program_photos/';
		        $res = $file->move($path, $finalImageName);
		        $photos = new ProgramGallery();
		        $photos->image_name = $finalImageName; 
		        $program->photos()->save($photos);
		    }
	        \Session::flash('flash_msg','Program has been successfully added!');
 		    return redirect('/admin/program/');
		}else{
			\Session::flash('flash_msg','Please upload image!');
     		return redirect('/admin/program/');
		}

    }

    //Edit page
    public function edit($id){
    	$program = Program::findOrFail($id);
    	return view('admin.program.edit', [
    		'program' => $program
    	]);
    }


    //Function to update program
    public function update($id, Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

    	$program = Program::findOrFail($id);


        if ($request->hasFile('image_name')) {
            $program->title = $request->title;
            $program->description = $request->description;
            $program->save();

            $files = \Input::file('image_name');
            $output = "";
            foreach ($files as $file) {
                //Get the tmp and orginal name of image
                $imageName = $file->getClientOriginalName();
                $finalImageName  = time() . '.' . $imageName;
                $output .= $file->getClientOriginalName();
                $path = base_path() . '/public/uploads/program_photos/';
                $res = $file->move($path, $finalImageName);
                $photos = new ProgramGallery();
                $photos->image_name = $finalImageName; 
                $program->photos()->save($photos);
            }
            \Session::flash('flash_msg','Program has been successfully updated!');
            return redirect('/admin/program/');
            return "file";
        }else{
            $program->title = $request->title;
            $program->description = $request->description;
            $program->save();
            \Session::flash('flash_msg','Please upload image!');
            return redirect('/admin/program/');
        }

    }


    //Function to delete logo
    public function destroy($id){

        
        //Get all the photos of the program
        $photos = Program::findOrFail($id)->photos;

        //Remove all the photos of the program from the server
        foreach ($photos as $photo) {
            $file =  base_path('public/uploads/program_photos/'.$photo->image_name);
            if (file_exists($file)){
                unlink($file);
            }
        }

        //Delete the information of program from the database
        $program = Program::findOrFail($id);
        $program->delete();
        
        \Session::flash('flash_msg','Program is successfully deleted!');
        return redirect('/admin/program/');

    }

    public function deleteProgramPhoto(Request $request){
        //Get all the photos of the program

        $photo_id = $request->pid;
        $program_id = $request->program_id;
        $photos = ProgramGallery::findOrFail($photo_id);

        $myfile = public_path('uploads/program_photos/'.$photos->image_name);

        if (file_exists($myfile)){
            unlink($myfile);
            $photos->delete();
            \Session::flash('flash_msg','Photo deleted');
            return "deleted";
        }else{
            return "No Photo";
        }
    }

}
