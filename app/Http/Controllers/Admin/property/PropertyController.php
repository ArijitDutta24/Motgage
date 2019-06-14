<?php

namespace App\Http\Controllers\Admin\property;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Category;
use App\Models\PropertyImage;
use Auth;
use Image;
use File;

class PropertyController extends Controller
{
    public function index(AdminRepository $AdminRepository)
    {
    	$table = new Property;
    	$where = array('is_deleted'=>0);
    	$user = $AdminRepository->getAllByWhere($table, $where);
    	return view('admin.pages.property.list', compact('user'));
    }


    public function details(AdminRepository $AdminRepository, $id)
    {
    	$detailId = base64_decode($id);
    	
    	$table = new Property;
    	$propDetail = $AdminRepository->getById($detailId, $table);

        // dd($propDetail->user);
    	return view('admin.pages.property.detail', compact('propDetail'));
    }


    public function add(AdminRepository $AdminRepository)
    {
    	$table = new User;
        $where = array('role_id'=>2);
        $user = $AdminRepository->getAllByWhere($table, $where);
        // dd($user);
        $table1 = new Category;
        $catWhere = array('parent_type'=>0);
        $cat = $AdminRepository->getAllByWhere($table1, $catWhere);
        return view('admin.pages.property.add', compact('user', 'cat'));
    	
    }


    public function ajaxSubFetch(AdminRepository $AdminRepository, Request $request)
    {
        $id = $request->input('id');
        // echo $id;
        $table = new Category;
        $where = array('parent_id'=>$id);
        $data = $AdminRepository->getAllByWhere($table, $where);
        // print_r($data);
        if(count($data)>0)
        {
            $output = '<option value="0">--Select--</option>';
            foreach ($data as $value) 
            {
                 $output .= '<option value="'.$value->id.'">'.$value->cat_name.'</option>';
                 
            }
            echo $output;
        } 
        else
        {
            $output = '<option value="0">--Select--</option>';

            echo $output;
        }

        
    }


    public function ajaxFetch(AdminRepository $AdminRepository, Request $request)
    {
        $id = $request->input('id');

        $table = new Category;
        $where = array('parent_id'=>$id);
        $data = $AdminRepository->getAllByWhere($table, $where);
        if(count($data)>0)
        {
            $output = '<option value="0">--Select--</option>';
            foreach ($data as $value) 
            {
                 $output .= '<option value="'.$value->id.'">'.$value->cat_name.'</option>';
                 
            }
            echo $output;
        } 
        else
        {
            $output = '<option value="0">--Select--</option>';

            echo $output;
        }

        
    }


    public function store(AdminRepository $AdminRepository, Request $request)
    {
    	
    	
        $table = new Property;
        
        $request->validate([
            'name'        => 'required|max:150',
            'propcat'     => 'required',
            'subcat'      => 'required',
            'country'     => 'required',
            'state'       => 'required',
            'city'        => 'required',
            'zipcode'     => 'required',  
            'addr'        => 'required', 
            'desc'        => 'required', 
            'enddate'     => 'required', 
            'etime'       => 'required',
            'price'		  => 'required',
            'main_pic'	  => 'required'
        ]);


    	//Main Image Insert 
    	if($request->hasFile('main_pic'))
    	{
    		$image = $request->file('main_pic');
    		//Create Image Name
    	    $img = 'Main_'.time().'.'.$image->getClientOriginalExtension(); 
    		$location = public_path('upload/property/'.$img);
    		Image::make($image)->save($location);
    	}
    	
        $where = array('prop_name'=> $request->input('name'));
        $prop = $AdminRepository->getByWhere($table, $where);
        if ($prop === null) {
        		    	
	          if($request->input('subsubcat') == 0)
	          {
	        	$data = array(
		            'prop_name'   => $request->input('name'),
		            'catid'  	  => $request->input('subcat'),
		            'prop_desc'   => $request->input('desc'),
		            'picture'	  => $img,
		            'prop_country'=> $request->input('country'),
		            'prop_state'  => $request->input('state'),
		            'prop_city'   => $request->input('city'),  
		            'prop_addr'   => $request->input('addr'), 
		            'prop_pincode'=> $request->input('zipcode'), 
		            'prop_price'  => $request->input('price'), 
		            'user_id'     => $request->input('user_id'),
		            'created_by'  => 'Admin',
		            'status'      => 0,
		            'endDate'     => $request->input('enddate'),
		            'endTime'     => $request->input('etime'),
		            
		        );
	          }
	          else
	          {
	          	$data = array(
	            'prop_name'   => $request->input('name'),
	            'catid'  	  => $request->input('subsubcat'),
	            'prop_desc'   => $request->input('desc'),
	            'picture'	  => $img,
	            'prop_country'=> $request->input('country'),
	            'prop_state'  => $request->input('state'),
	            'prop_city'   => $request->input('city'),  
	            'prop_addr'   => $request->input('addr'), 
	            'prop_pincode'=> $request->input('zipcode'), 
	            'prop_price'  => $request->input('price'), 
	            'user_id'     => $request->input('user_id'),
	            'created_by'  => 'Admin',
	            'status'      => 0,
	            'endDate'     => $request->input('enddate'),
	            'endTime'     => $request->input('etime')
		        );
	          }

          	$prop_id = $AdminRepository->create($data, $table);
           
           //Gallery Images Insert
           if(count($request->gallery_pic) > 0)
	    	{
	    		foreach ($request->gallery_pic as $image) 
	    		{
	    				//Create Image Name
			    		$img1 = time().'.'.$image->getClientOriginalExtension(); 
			    		$location = public_path('upload/property/'.$img1);
			    		Image::make($image)->save($location);

			    		$table1 = new PropertyImage;
			    		$data1 = array(
	            			'prop_id'   => $prop_id->id,
	            			'prop_pic'  => $img1
		        		);
			    		
			    	$AdminRepository->create($data1, $table1);
			    	
	    		}
	    	}
           session()->flash('success', 'New Motgage Property Created Successfully');
            return redirect()->route('admin.propList');
        }
        else
        {
            session()->flash('errors', 'Motgage Property Already Exist');
            return redirect()->route('admin.propList');
        }   
        

    }



    public function edit(AdminRepository $AdminRepository, $id)
    {
    	$editId = base64_decode($id);

    	//Property
    	$table = new Property;
    	$prop = $AdminRepository->getById($editId, $table);

    	//User
        $table2 = new User;
        $where = array('role_id'=>2);
        $user = $AdminRepository->getAllByWhere($table2, $where);
        

        //Category
        $table1 = new Category;
        $catWhere = array('id'=>$prop->catid);
        $procat = $AdminRepository->getByWhere($table1, $catWhere);

        $catgwhere = array('parent_type'=>0);
       	$catg = $AdminRepository->getAllByWhere($table1, $catgwhere);
       	// dd($procat);
       	$catgwhere1 = array('parent_id'=>$procat->parent_id);
       	$catg1 = $AdminRepository->getAllByWhere($table1, $catgwhere1);
       	
       	
        if($procat->parent_type == 2)
        {
        	$allsubcatWhere = array('id'=>$procat->parent_id);
        	$allsubcat = $AdminRepository->getByWhere($table1, $allsubcatWhere);

        	$allsubcatWhere1 = array('parent_id'=>$allsubcat->parent_id);
        	$allsubcat1 = $AdminRepository->getAllByWhere($table1, $allsubcatWhere1);

        	
        	$pcatWhere = array('id'=>$procat->parent_id);
        	$subcat = $AdminRepository->getByWhere($table1, $pcatWhere);

        	$mcatWhere = array('id'=>$subcat->parent_id);
        	$cat = $AdminRepository->getByWhere($table1, $mcatWhere);

        	return view('admin.pages.property.edit', compact('user', 'cat', 'prop', 'catg', 'subcat', 'allsubcat1', 'catg1'));
    	}
    	else
    	{
    		$pcatWhere = array('id'=>$procat->parent_id);
        	$subcat = $AdminRepository->getByWhere($table1, $pcatWhere);
        	
        	$mcatWhere = array('parent_id'=>$subcat->parent_id);
        	$cat = $AdminRepository->getAllByWhere($table1, $mcatWhere);
    		
        	return view('admin.pages.property.edit', compact('user', 'prop', 'catg1', 'subcat', 'cat'));
    	}


    }



    public function update(AdminRepository $AdminRepository, Request $request, $id)
    {
    	$updId = base64_decode($id);
    	
        $table = new Property;
        
        $request->validate([
            'name'        => 'required|max:150',
            'propcat'     => 'required',
            'subcat'      => 'required',
            'country'     => 'required',
            'state'       => 'required',
            'city'        => 'required',
            'zipcode'     => 'required',  
            'addr'        => 'required', 
            'desc'        => 'required', 
            'enddate'     => 'required', 
            'etime'       => 'required',
            'price'		  => 'required'
        ]);

     
               		    	
	      if($request->input('subsubcat') == 0)
	      {
	    	$data = array(
	            'prop_name'   => $request->input('name'),
	            'catid'  	  => $request->input('subcat'),
	            'prop_desc'   => $request->input('desc'),
	            'prop_country'=> $request->input('country'),
	            'prop_state'  => $request->input('state'),
	            'prop_city'   => $request->input('city'),  
	            'prop_addr'   => $request->input('addr'), 
	            'prop_pincode'=> $request->input('zipcode'), 
	            'prop_price'  => $request->input('price'),
	            'endDate'     => $request->input('enddate'),
	            'endTime'     => $request->input('etime')
	            
	        );
	      }
	      else
	      {
	      	$data = array(
	        'prop_name'   => $request->input('name'),
	        'catid'  	  => $request->input('subsubcat'),
	        'prop_desc'   => $request->input('desc'),
	        'prop_country'=> $request->input('country'),
	        'prop_state'  => $request->input('state'),
	        'prop_city'   => $request->input('city'),  
	        'prop_addr'   => $request->input('addr'), 
	        'prop_pincode'=> $request->input('zipcode'), 
	        'prop_price'  => $request->input('price'),
	        'endDate'     => $request->input('enddate'),
	        'endTime'     => $request->input('etime')
	        );
	      }

	  	$return = $AdminRepository->update($data, $updId, false, $table);
	   
	  	if($return)
	  	{
	   		session()->flash('success', ' Motgage Property Update Successfully');
	    	return redirect()->route('admin.propList');
	    }
	    else
	    {
	    	session()->flash('errors', 'Motgage Property Not Update');
            return redirect()->route('admin.propList');
	    }
         
        

    }



    public function galleryUpdate(Request $request, AdminRepository $AdminRepository, $id)
    {
        $galId = base64_decode($id);
        $table = new Property;

        $prop = Property::find($galId);
        
        //Main Image Insert 
        if(count($request->mainpic) > 0)
        {
         //Delete Old Images
            if(File::exists('upload/property/'.$prop->picture))
            {
                File::delete('upload/property/'.$prop->picture);
            }

         //Inasert New Image
         $image = $request->file('mainpic');
         //Create Image Name
         $img = 'Main_'.time().'.'.$image->getClientOriginalExtension(); 
         $location = public_path('upload/property/'.$img);
         Image::make($image)->save($location);
        }

        $data = array('picture' => $img);
        $return = $AdminRepository->update($data, $galId, false, $table);
        if($return)
        {
            session()->flash('success', ' Main Image Update Successfully');
            return redirect()->route('admin.propGalleryList', $id);
        }
        else
        {
            session()->flash('errors', 'Main Image Not Update');
            return redirect()->route('admin.propGalleryList', $id);
        }
    }



    public function multipleImageUpdate(Request $request, AdminRepository $AdminRepository, $id)
    {
        $mulId = base64_decode($id);
        // dd($mulId);
        $table = new PropertyImage;

        $prop = $table::find($mulId);

        // dd($request->multiplePic);
        //Main Image Insert 
        if(count($request->multiplePic) > 0)
        {
         //Delete Old Images
            
            if(File::exists('upload/property/'.$prop->prop_pic))
            {
                File::delete('upload/property/'.$prop->prop_pic);
            }

         //Inasert New Image
         $image = $request->file('multiplePic');
         //Create Image Name
         $img = time().'.'.$image->getClientOriginalExtension(); 
         $location = public_path('upload/property/'.$img);
         Image::make($image)->save($location);
        }

        $data = array('prop_pic' => $img);
        $return = $AdminRepository->update($data, $mulId, false, $table);
        if($return)
        {
            session()->flash('success', ' Image Update Successfully');
            return redirect()->route('admin.propGalleryList', base64_encode($prop->prop_id));
        }
        else
        {
            session()->flash('errors', 'Image Not Update');
            return redirect()->route('admin.propGalleryList', base64_encode($prop->prop_id));
        }
    }


    public function status(Request $request, AdminRepository $AdminRepository, $id)
    {
    	$statId = base64_decode($id);
    	$table = new Property;
    	$data = $AdminRepository->getById($statId, $table);

    	if(!empty($data->id))
    	{
    		if($data->status == 0)
    		{
    			$data = array('status'=>1);
    		}
    		else
    		{
    			$data = array('status'=>0);	
    		}
    		$AdminRepository->update($data, $statId, false, $table);
    		
    		session()->flash('success', 'Motgage Property Status Change Successfully');
            return redirect()->route('admin.propList');
    	}
    	else
    	{
    		session()->flash('errors', 'Motgage Property Status Not Change Successfully');
            return redirect()->route('admin.propList');
    	}
    }


    public function delete(Request $request, AdminRepository $AdminRepository, $id)
    {
    	$delId = base64_decode($id);
    	$table = new Property;
    	$table1 = new PropertyImage;
    	$data = $AdminRepository->getById($delId, $table);

    	// dd($data);
    	if(!empty($data->id))
    	{
    		$where = array('id'=>$delId);
    		$AdminRepository->delete($table, $where);
    		$where1 = array('prop_id'=>$delId);
    		$AdminRepository->delete($table1, $where1);

    		session()->flash('success', 'Motgage Property Permanent Deleted Successfully');
            return redirect()->route('admin.propList');
    	}
    	else
    	{
    		session()->flash('errors', 'Motgage Property Not Permanent Deleted Successfully');
            return redirect()->route('admin.propList');
    	}
    }



    public function softDelete(Request $request, AdminRepository $AdminRepository, $id)
    {
    	$delId = base64_decode($id);
    	$table = new Property;
    	$data = $AdminRepository->getById($delId, $table);

    	if(!empty($data->id))
    	{
    		$data = array('is_deleted'=>1);
    		$AdminRepository->update($data, $delId, false, $table);
    		
    		session()->flash('success', 'Motgage Property Deleted Successfully');
            return redirect()->route('admin.propList');
    	}
    	else
    	{
    		session()->flash('errors', 'Motgage Property Not Deleted Successfully');
            return redirect()->route('admin.propList');
    	}
    }


    public function gallery(AdminRepository $AdminRepository, $id)
    {
        $mainPicId = base64_decode($id);

        $table = new Property;
        $data = $AdminRepository->getById($mainPicId, $table);

        $table1 = new PropertyImage;
        $where = array('prop_id' => $mainPicId);
        $allPic = $AdminRepository->getAllByWhere($table1, $where);
        // dd($allPic);       
        return view('admin.pages.property.gallery', compact('data', 'allPic'));
    }



    public function galleryDelete(Request $request, AdminRepository $AdminRepository, $id)
    {
        $delId = base64_decode($id);
        $table = new PropertyImage;
        $data = $AdminRepository->getById($delId, $table);
        $encode = base64_encode($data->prop_id);
        // dd($data);
        if(!empty($data->id))
        {
            $where = array('id'=>$delId);
            $AdminRepository->delete($table, $where);

            session()->flash('success', 'Picture Permanent Deleted Successfully');
            return redirect()->route('admin.propGalleryList', $encode);
        }
        else
        {
            session()->flash('errors', 'Picture Not Deleted Successfully');
            return redirect()->route('admin.propGalleryList', $encode);
        }
    }
}
