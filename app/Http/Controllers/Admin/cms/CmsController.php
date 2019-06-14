<?php

namespace App\Http\Controllers\Admin\cms;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\Cms;
use Auth;

class CmsController extends Controller
{
	
    
    function index(AdminRepository $AdminRepository) 
    {
    	$table = new Cms;
    	$cmsData = $AdminRepository->getAll($table);
        return view('admin.pages.cms.list', compact('cmsData'));
    }


    function edit(AdminRepository $AdminRepository, $id) 
    {

    	$cms_id = base64_decode($id);
    	$table = new Cms;
    	$editCms = $AdminRepository->getById($cms_id, $table);
    	return view('admin.pages.cms.edit', compact('editCms'));
    	// dd($editCms);
    }


    function update(AdminRepository $AdminRepository, $id, Request $request)
    {
    	$cms_id = base64_decode($id);
    	$request->validate([
    		'title'        => 'required|max:150',
    		'desc'		   => 'required'    		
    	]);

    	$data = array(
    		'cms_title'       => $request->input('title'),
    		'cms_desc' 		  => $request->input('desc')
    	);

    	$table = new Cms;
    	$AdminRepository->update($data, $cms_id, false, $table);
    	
    		session()->flash('success', $request->input('title').' Has Update Successfully');
			return redirect()->route('admin.cms');
		
    }

}
