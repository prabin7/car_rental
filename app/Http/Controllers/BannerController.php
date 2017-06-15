<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use DB;
use File;

class BannerController extends Controller
{
    //Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    //Banner  page
    public function index($slug){
    	$banner = DB::table('banner')->where('slug', $slug)->first();
    	return view('admin.banner.index', [
    		'banner' => $banner
    	]);
    }

    //Edit banner
    public function edit($slug){
    	$banner = DB::table('banner')->where('slug', $slug)->first();
    	return view('admin.banner.edit', [
    		'banner' => $banner
    	]);
    }

    //Function to update banner
    public function update(Request $request, $slug){
    	//Validation
    	$this->validate($request, [
	        'title' => 'required',
            'status' => 'required',
	    ]);
	    $banner = Banner::where('slug', '=' , $slug)->firstOrFail();
	    // dd($banner);
	    if ($request->hasFile('image_name')) {
    		//Check if old image exiss and delete the old image from the folder
            $oldImage=base_path('public/uploads/banner/'.$request->old_image_name);
            if (file_exists($oldImage)){
                unlink($oldImage);
            }
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $extension = File::extension($imageName);
            $finalImageName  = $slug.'-banner.'.$extension;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/banner';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $banner->update($data);
            \Session::flash('flash_msg','Banner has been successfully updated!');
            return redirect('/admin/banner/'.$slug);
        }else{
            $data = $request->all();
            $banner->update($data);
            \Session::flash('flash_msg','Banner has been successfully updated!');
            return redirect('/admin/banner/'.$slug);
        }
    }

    //Banner  page
    public function indexBanner($slug){
        $banner = DB::table('banner')->where('slug', $slug)->first();
        return view('admin.homeBanner.index', [
            'banner' => $banner
        ]);
    }

    //Edit banner
    public function editBanner($slug){
        $banner = DB::table('banner')->where('slug', $slug)->first();
        return view('admin.homeBanner.edit', [
            'banner' => $banner
        ]);
    }

    //Function to update banner
    public function updateBanner(Request $request, $slug){
        //Validation
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $banner = Banner::where('slug', '=' , $slug)->firstOrFail();
        // dd($banner);
        if ($request->hasFile('image_name')) {
            //Check if old image exiss and delete the old image from the folder
            $oldImage=base_path('public/uploads/banner/'.$request->old_image_name);
            if (file_exists($oldImage)){
                unlink($oldImage);
            }
            //Get the tmp and orginal name of image
            $imageTempName = $request->file('image_name');
            $imageName = $request->file('image_name')->getClientOriginalName();
            //Rename image name
            $extension = File::extension($imageName);
            $finalImageName  = $slug.'-banner.'.$extension;
            //Provide the destination path and Move it to the folder
            $path = base_path() . '/public/uploads/banner';
            //Move to the dwstination
            $res=$imageTempName->move($path , $finalImageName);
            //Save image name into database
            $data = $request->all();
            $data['image_name'] = $finalImageName;
            $banner->update($data);
            \Session::flash('flash_msg','Banner has been successfully updated!');
            return redirect('/admin/homeBanner/'.$slug);
        }else{
            $data = $request->all();
            $banner->update($data);
            \Session::flash('flash_msg','Banner has been successfully updated!');
            return redirect('/admin/homeBanner/'.$slug);
        }
    }

}
