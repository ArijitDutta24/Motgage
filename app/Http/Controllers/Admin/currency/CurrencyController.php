<?php

namespace App\Http\Controllers\Admin\currency;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\Currency;
use Auth;

class CurrencyController extends Controller
{
    public function index(AdminRepository $AdminRepository)
    {
    	$table = new Currency;
    	$where = array('is_deleted'=> 1);
        $curr = $AdminRepository->getAllByWhere($table, $where);

    	return view('admin.pages.currency.list', compact('curr'));
    }


    public function add()
    {
    	return view('admin.pages.currency.add');
    }


    public function store(Request $request, AdminRepository $AdminRepository)
    {
    	$table = new Currency;
        
        $request->validate([
            'cname'     => 'required|max:150',
            'ccode'     => 'required',
            'cprice'    => 'required',
            'status'    => 'required'
        ]);

        $where = array('curr_name'=> $request->input('cname'));
        $curr = $AdminRepository->getByWhere($table, $where);

        if ($curr === null) 
        {
        	$data = array(
		            'curr_name'   => $request->input('cname'),
		            'curr_code'   => $request->input('ccode'),
		            'curr_rate'   => $request->input('cprice'),
		            'status'	  => $request->input('status')
		        );
        	$currAdd = $AdminRepository->create($data, $table);
        

	        if(count($currAdd)>0)
	        {
				session()->flash('success', 'New Currency Created Successfully');
	            return redirect()->route('admin.currList');       	
	        }
	        else
	        {
	        	session()->flash('errors', 'Currency Create Not Successfully');
	            return redirect()->route('admin.currList');
	        }
    	}
    	else
    	{
    		session()->flash('errors', 'Currency Already Exist');
	        return redirect()->route('admin.currList');
    	}
    	
    }


    public function edit(AdminRepository $AdminRepository, $id)
    {
    	$editId = base64_decode($id);
    	$table = new Currency;
    	$data = $AdminRepository->getById($editId, $table);
    	return view('admin.pages.currency.edit', compact('data'));
    }


    public function update(AdminRepository $AdminRepository, $id, Request $request)
    {
    	$updId = base64_decode($id);
    	$table = new Currency;

    	$request->validate([
            'cprice'    => 'required',
            'status'    => 'required'
        ]);

        $data = array(
		            'curr_rate'   => $request->input('cprice'),
		            'status'	  => $request->input('status')
		        );

        $update = $AdminRepository->update($data, $updId, false, $table);
    	if($update)
    	{
    		session()->flash('success', 'Currency Update Successfully');
            return redirect()->route('admin.currList');
    	}
    	else
    	{
    		session()->flash('errors', 'Currency Not Update');
            return redirect()->route('admin.currList');	
    	}
    }



    public function status(Request $request, AdminRepository $AdminRepository, $id)
    {
    	$statId = base64_decode($id);
    	$table = new Currency;
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
    		
    		session()->flash('success', 'Currency Status Change Successfully');
            return redirect()->route('admin.currList');
    	}
    	else
    	{
    		session()->flash('errors', 'Currency Status Not Change Successfully');
            return redirect()->route('admin.currList');
    	}
    }



    public function delete(Request $request, AdminRepository $AdminRepository, $id)
    {
    	$delId = base64_decode($id);
    	$table = new Currency;
    	$data = $AdminRepository->getById($delId, $table);

    	// dd($data);
    	if(!empty($data->id))
    	{
    		$where = array('id'=>$delId);
    		$AdminRepository->delete($table, $where);
    		
    		session()->flash('success', 'Currency Permanent Deleted Successfully');
            return redirect()->route('admin.currList');
    	}
    	else
    	{
    		session()->flash('errors', 'Currency Not Permanent Deleted Successfully');
            return redirect()->route('admin.currList');
    	}
    }



    public function softDelete(Request $request, AdminRepository $AdminRepository, $id)
    {
    	$delId = base64_decode($id);
    	$table = new Currency;
    	$data = $AdminRepository->getById($delId, $table);

    	if(!empty($data->id))
    	{
    		$data = array('is_deleted'=>0);
    		$AdminRepository->update($data, $delId, false, $table);
    		
    		session()->flash('success', 'Currency Deleted Successfully');
            return redirect()->route('admin.currList');
    	}
    	else
    	{
    		session()->flash('errors', 'Currency Not Deleted Successfully');
            return redirect()->route('admin.currList');
    	}
    }
}
