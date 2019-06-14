<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    

    public function index(AdminRepository $AdminRepository)
    {
    	$table = new Category;
    	$where = array('parent_id'=> 0);
    	$category = $AdminRepository->getAllByWhere($table, $where);
        return view('admin.pages.category.list', compact('category'));
    }


    public function subdetail(AdminRepository $AdminRepository, $id)
    {
        $parentId = base64_decode($id);
        $table = new Category;
        $where = array('parent_id'=>$parentId);
        $cat = $AdminRepository->getAllByWhere($table, $where);
        $data = $AdminRepository->getById($parentId, $table);

        return view('admin.pages.category.detail', compact('data', 'cat'));
    }


    public function subsubdetail(AdminRepository $AdminRepository, $id)
    {
        $parentId = base64_decode($id);
        $table = new Category;
        $where = array('parent_id'=>$parentId);
        $cat = $AdminRepository->getAllByWhere($table, $where);
        $data = $AdminRepository->getById($parentId, $table);
        // dd($parentId);
        return view('admin.pages.category.subdetail', compact('data', 'cat'));
    }


    public function add(AdminRepository $AdminRepository)
    {
    	$table = new Category;
    	$where = array('parent_id' => 0);
    	$cat = $AdminRepository->getAllByWhere($table, $where);
    	
    	foreach ($cat as $val) 
    	{
    		$id = $val->id;
    		$where1 = array('parent_id'=>$id);
    		$subcat = $AdminRepository->getAllByWhere($table, $where1);
    		return view('admin.pages.category.add', compact('cat', 'subcat'));
    	}

        return view('admin.pages.category.add', compact('cat'));
    	
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
    	$request->validate([
            'subcat'        => 'required'
        ]);

    	if($request->input('category') == 0)
    	{
        	$data = array(
	            'cat_name'    => $request->input('subsubcat'),
	            'cat_slug'    => str_slug($request->input('subsubcat')),
	            'parent_id'   => $request->input('category'),
	            'parent_type' => 0
	        );
        }
        elseif($request->input('subcat') != 0)
        {
        	$data = array(
	            'cat_name'    => $request->input('subsubcat'),
	            'cat_slug'    => str_slug($request->input('subsubcat')),
	            'parent_id'   => $request->input('subcat'),
	            'parent_type' => 2
	        );
        }
        else
        {
            $data = array(
                'cat_name'    => $request->input('subsubcat'),
                'cat_slug'    => str_slug($request->input('subsubcat')),
                'parent_id'   => $request->input('category'),
                'parent_type' => 1
            );
        }

        $table = new Category;
        $AdminRepository->create($data, $table);
        session()->flash('success', 'New Category Created Successfully');
        return redirect()->route('admin.catList');
    }

    public function edit(Request $request, AdminRepository $AdminRepository, $id)
    {
        $editId = base64_decode($id);
        $table = new Category;
        $editData = $AdminRepository->getById($editId, $table);

        if($editData->parent_type == 0)
        {
            $where = array('cat_name'=>$id);
            $selectData = $AdminRepository->getAllByWhere($table, $where);
            // dd($selectData);
            return view('admin.pages.category.edit', compact('editData', 'selectData'));
        }
        elseif($editData->parent_type == 1)
        {
            $where = array('parent_type'=>0);
            $selectData = $AdminRepository->getAllByWhere($table, $where);
            return view('admin.pages.category.edit', compact('editData', 'selectData'));

        }
        else
        {
                
            $where = array('parent_type'=>1);
            $selectData = $AdminRepository->getAllByWhere($table, $where);    
            
            return view('admin.pages.category.edit', compact('editData', 'selectData'));

        }
    }

    public function update(AdminRepository $AdminRepository, Request $request, $id)
    {
    	$updateId = base64_decode($id);
        $request->validate([
            'subcat'       => 'required'
        ]);

        if($request->input('parent') == 0)
        {
            $data = array(
            'parent_id'   => $request->input('parent'),
            'cat_name'    => $request->input('subcat'),
            'cat_slug'    => str_slug($request->input('subcat')),
            'parent_type' => 0
            );
        }
        elseif($request->input('parent') == 1 || $request->input('parent') == 2)
        {
            $data = array(
            'parent_id'   => $request->input('parent'),
            'cat_name'    => $request->input('subcat'),
            'cat_slug'    => str_slug($request->input('subcat')),
            'parent_type' => 1
            );
        }
        else
        {
            $data = array(
            'parent_id'   => $request->input('parent'),
            'cat_name'    => $request->input('subcat'),
            'cat_slug'    => str_slug($request->input('subcat')),
            'parent_type' => 2
            );
        }

        $table = new Category;
        
        $AdminRepository->update($data, $updateId, false, $table);

        session()->flash('success', 'Category Has Update Successfully');
        return redirect()->route('admin.catList');
    }

    public function delete(AdminRepository $AdminRepository, $id)
    {
        $delId = base64_decode($id);
        $table = new Category;
        $delData = $AdminRepository->getById($delId, $table);
        
        if(count($delData)>0)
        {
            if($delData->parent_type == 2)
            {
                $where = array('id'=>$delId);
                $delete = $AdminRepository->delete($table, $where);
                session()->flash('success', 'Category Delete Successfully');
                
            }
            if($delData->parent_type == 1)
            {
                $where = array('id'=>$delId);
                $delete = $AdminRepository->delete($table, $where);
                $sub = array('parent_id'=>$delId);
                $delete = $AdminRepository->delete($table, $sub);
                session()->flash('success', 'Category Delete Successfully');
                
            }

            

            echo $delete;
        }
        
    }

    
}
