<?php

namespace App\Http\Controllers\Admin\client;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Property;
use Auth;

class ClientController extends Controller
{
    
    
    function index(AdminRepository $AdminRepository) 
    {
        $table = new User;
        $where = array('role_id'=>2);
        $clientData = $AdminRepository->getAllByWhere($table, $where);
        return view('admin.pages.client.list', compact('clientData'));
    }


    public function add()
    {
        
        return view('admin.pages.client.add');
    }

    public function store(AdminRepository $AdminRepository, Request $request, $role_id = 2)
    {
        $table = new User;
        $request->validate([
            'email'        => 'required|max:150',
            'fname'        => 'required',
            'lname'        => 'required',
            'pword'        => 'required',
            'cpword'       => 'required',
            'addr'         => 'required',
            'city'         => 'required',  
            'zipcode'      => 'required', 
            'country'      => 'required'
        ]);

        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user === null) {
          
        $data = array(
            'role_id' => '2',
            //'first_name' => 'Super',
            'name' => $request->input('fname').' '.$request->input('lname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('pword'))
        );

                
        $user_id = $AdminRepository->create($data, $table);

        $datainfo = array(
        'user_id'     => $user_id->id,
        'address'     => $request->input('addr'),
        'city'        => $request->input('city'),
        'postal_code' => $request->input('zipcode'),
        'country_id'  => $request->input('country')
        );

        $tableInfo = new Userinfo;
        $AdminRepository->create($datainfo, $tableInfo);
            session()->flash('success', 'New User Created Successfully');
            return redirect()->route('admin.clientList');
        }
        else
        {
            session()->flash('errors', 'User Already Exist');
            return view('admin.pages.client.add');
        }   
        

    }


    public function edit(AdminRepository $AdminRepository, $id)
    {
        $user_id = base64_decode($id);
        
        $table = new User;
        $table1 = new Userinfo;
        $editUser = $AdminRepository->getById($user_id, $table);
        
        $where = array('user_id'=>$user_id);
        $userInfo = $AdminRepository->getAllByWhere($table1, $where);
        // dd($userInfo);
        return view('admin.pages.client.edit', compact('editUser','userInfo'));
    }


    public function update(Request $request, AdminRepository $AdminRepository, $id)
    {
        $user_id = base64_decode($id);

        $request->validate([
            'addr'         => 'required',
            'city'         => 'required',  
            'zipcode'      => 'required', 
            'country'      => 'required'
        ]);

        $data = array(
        'address'     => $request->input('addr'),
        'city'        => $request->input('city'),
        'postal_code' => $request->input('zipcode'),
        'country_id'  => $request->input('country')
        );

        $table = new Userinfo;
        $where = array('user_id' => $user_id);
        $id = $AdminRepository->getByWhere($table, $where);
        
        $AdminRepository->update($data, $id->id, false, $table);
        
            session()->flash('success', $request->input('fname').' Has Update Successfully');
            return redirect()->route('admin.clientList');
            
            
    }

    public function status(AdminRepository $AdminRepository, $id)
    {
        $user_id = base64_decode($id);
        $table = new User;
        
        $userData = $AdminRepository->getById($user_id, $table);

        $userActive = $userData->is_active;
        
        if($userActive == 1)
        {
            $data = array('is_active' => 0);
        }
        else
        {
            $data = array('is_active' => 1);   
        }

        $AdminRepository->update($data, $user_id, false, $table);
            
            session()->flash('success', 'User Has Update Successfully');
            return redirect()->route('admin.clientList');
            
            
    }


    public function delete(AdminRepository $AdminRepository, $id)
    {
        $user_id = base64_decode($id);
        
        $table = new User;
        $table1 = new Userinfo;
        $where = array('id'=>$user_id);
        $roleWhere = array('user_id'=>$user_id);
        
        $user = $AdminRepository->delete($table, $where);
        $role = $AdminRepository->delete($table1, $roleWhere);
        if($user==true && $role==true)
        {    
            session()->flash('success', 'User Deleted Successfully');
            
        }
        else
        {
            session()->flash('errors', 'User Deleted Not Successfully');
            
        }   

        echo $user;
            
    }


    public function userDetails(AdminRepository $AdminRepository, $id)
    {
        $user_id = base64_decode($id);
        $table = new Userinfo;
        $table1 = new User;
        $where = array('user_id' => $user_id);
        $data = $AdminRepository->getByWhere($table, $where);
        $user = $AdminRepository->getById($user_id, $table1);
        
        return view('admin.pages.client.personal', compact('data','user'));
    }


    public function bidDetails(AdminRepository $AdminRepository, $id)
    {
        $user_id = base64_decode($id);
        
        $table = new User;
        $user = $AdminRepository->getById($user_id, $table);

        $table1 = new Property;
        $where = array('user_id'=>$user_id);
        $prop = $AdminRepository->getAllByWhere($table1, $where);
        
        return view('admin.pages.client.bidder', compact('user', 'prop'));
    }

}
