<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use File;

class LogoController extends Controller
{
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Home page
    public function index(){
    	$logo = Logo::all();
    	return view('admin.logo.index', [
    		'logo' => $logo
    	]);
    }

    // //Create page
    // public function create(){
    // 	return view('admin.logo.create');
    // }

    // //Function to store logo in database
    // public function store(Request $request){
    // 	//Validation
    // 	$this->validate($request, [
	   //      'image_name' => 'required',
	   //  ]);
    // 	//Check if there is image or not
	   //  if ($request->hasFile('image_name')) {
    //         //Get the tmp and orginal name of image
    //         $imageTempName = $request->file('image_name');
    //         $imageName = $request->file('image_name')->getClientOriginalName();
    //         //Rename image name
    //         $finalImageName  = time() . '.' . $imageName;
    //         //Provide the destination path and Move it to the folder
    //         $path = public_path() . '/img/logo';
    //         //Move to the dwstination
    //         $res=$imageTempName->move($path , $finalImageName);
    //         //Save image name into database
    //         $logo = new Logo();
    //         $logo->image_name = $finalImageName;
    //         $logo->save();
    //         \Session::flash('flash_msg','Logo has been successfully added!');
    //         return redirect('/admin/logo/');
    //     }else{
    //         \Session::flash('flash_msg','Please upload the image!');
    //         return redirect('/admin/logo/');
    //     }

    // }

    //Edit page
    public function edit($id){
    	$logo = Logo::findOrFail($id);
    	return view('admin.logo.edit', [
    		'logo' => $logo
    	]);
    }

    //Function to updat logo
    public function update($id, Request $request){
    	$logo = Logo::findOrFail($id);
    	if ($request->hasFile('image_name')) {
    		//Check if old image exiss and delete the old image from the folder
            $oldImage=base_path('public/uploads/logo/'.$request->old_image_name);
            if (file_exists($oldImage)){
                unlink($oldImage);
            }
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $extension = File::extension($imageName);
            $finalImageName  = 'logo.'.$extension;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/logo';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $logo->image_name = $finalImageName;
            $logo->status = $request->status;
            $logo->save();
            \Session::flash('flash_msg','Logo has been successfully updated!');
            return redirect('/admin/logo/');
        }else{
            // $logo->image_name = $request->old_image_name;
            $logo->status = $request->status;
            $logo->save();
            \Session::flash('flash_msg','Logo has been successfully updated!');
            return redirect('/admin/logo/');
        }

    }


    //Function to delete logo
    // public function destroy($id){
    //     $logo = Logo::findOrFail($id);
        // $myfile = public_path('img/logo/'.$logo->image_name);
        // if (file_exists($myfile)){
        //     unlink($myfile);
        //     $logo->delete();
        //     \Session::flash('flash_msg','Logo has been successfully deleted!');
        //     return redirect('/admin/logo/');  
        // }else{
        //     $logo->delete();
        //     \Session::flash('flash_msg','Logo has been successfully deleted!');
        //     return redirect('/admin/logo/');
        // }

    // }
}
