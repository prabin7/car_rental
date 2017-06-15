<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\CompanyDescription;
use File;

class CompanyDescriptionController extends Controller
{
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$companyDescription = CompanyDescription::all();
    	return view('admin.companyDescription.index', [
    		'companyDescription' => $companyDescription
    	]);
    }


    //Edit page
    public function edit($id){
    	$companyDescription = CompanyDescription::findOrFail($id);
    	return view('admin.companyDescription.edit', [
    		'companyDescription' => $companyDescription
    	]);
    }

    //Function to updat company details
    public function update($id, Request $request){
    	//Validation
    	$this->validate($request, [
	        'title' => 'required',
	        'description' => 'required',
	    ]);
    	$companyDescription = CompanyDescription::findOrFail($id);

    	if ($request->hasFile('image_name')) {
    		//Check if old image exiss and delete the old image from the folder
            $oldImage=base_path('public/uploads/companyDescription/'.$request->old_image_name);
            if (file_exists($oldImage)){
                unlink($oldImage);
            }
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $extension = File::extension($imageName);
            $finalImageName  = 'company.'.$extension;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/companyDescription';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $companyDescription->update($data);
            \Session::flash('flash_msg','Company Description has been successfully updated!');
            return redirect('/admin/companyDescription/');
        }else{
            $data = $request->all();
            $companyDescription->update($data);
            \Session::flash('flash_msg','Company Description has been successfully updated!');
            return redirect('/admin/companyDescription/');
        }

    }


}
