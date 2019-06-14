<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use Auth;
use Image;
use File;

class AdminDashboardController extends Controller {

    

    function index(AdminRepository $AdminRepository) {
    	$table = new Property;
    	$where = array('status'=>1, 'is_deleted'=>0);
    	$liveBid = $AdminRepository->getAllByLimit(5, $where, $table);
    	$latestProperty = $AdminRepository->getAllByLimit(3, $where, $table);
    	
        return view('admin.pages.dashboard.index', compact('liveBid', 'latestProperty'));
    }

    

    

    function profile(AdminRepository $AdminRepository) {
    	$table = new User;
    	$where = array('role_id'=>1);
    	$data = $AdminRepository->getByWhere($table, $where);
        return view('admin.pages.profile', compact('data'));
    }


    function profileUpdate(AdminRepository $AdminRepository, Request $request, $id) {

    	$table = new User;
    	$updId = base64_decode($id);
    	if($request->input('pword')=='')
    	{
    		$data = array('name'=> $request->input('name'));
    	}
    	else
    	{
    		$data = array(
    			'name'     => $request->input('name'),
    			'password' => bcrypt($request->input('pword'))
    			);
    	}
    	$update = $AdminRepository->update($data, $updId, false, $table);
    	
    	if($update)
    	{
    		session()->flash('success', 'Admin Profile Updated Successfully');
            return redirect()->route('admin.profile');
    	}
        else
        {
        	session()->flash('errors', 'Admin Profile Not Successfully Update');
            return redirect()->route('admin.profile');
        }
    }


    public function profileImageUpdate(AdminRepository $AdminRepository, Request $request, $id)
    {
    	$table = new User;
    	$imgId = base64_decode($id);

    	$lastImg = $table::find($imgId);

    	$request->validate([
            'profilepic'		  => 'required'
        ]);

        // dd($request->multiplePic);
        //Main Image Insert 
        if(count($request->profilepic) > 0)
        {
         //Delete Old Images
            
            if(File::exists('upload/profile/'.$lastImg->image))
            {
                File::delete('upload/profile/'.$lastImg->image);
            }

         //Inasert New Image
         $image = $request->file('profilepic');
         //Create Image Name
         $img = 'profile.'.$image->getClientOriginalExtension(); 
         $location = public_path('upload/profile/'.$img);
         Image::make($image)->save($location);
        }

        $data = array('image' => $img);
        $return = $AdminRepository->update($data, $imgId, false, $table);

        if($return)
        {
            session()->flash('success', ' Profile Image Update Successfully');
            return redirect()->route('admin.profile');
        }
        else
        {
            session()->flash('errors', 'Profile Image Not Update');
            return redirect()->route('admin.profile');
        }
    }

}
