<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;
use App\Models\Page;

class AdminDescriptionController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pageName = $this->pageName();
        $result = Page::orderBy('id', 'ASC');
        $pages  = $result->get()->toArray();

        $PageNameArr = array();

        if($pages)
        {
            foreach ($pages as $key => $eachPage) {
                $PageArr['page_number'] = $eachPage['page_number'];
                $PageArr['name']        = $eachPage['name'];

                $PageNameArr[] = $PageArr;
            }
        }

        return view('admin.description.index')->with('pageName', $PageNameArr);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDescription()
    {       
        $page_name = $this->request->get('page_name');

        $allData = Description::orderBy('id', 'DESC');

        if(intval($page_name))
        {            
            $allData->where('page_name', $page_name);
        }

        return datatables($allData)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Page::orderBy('id', 'ASC');
        $pages  = $result->get()->toArray();

        $PageNameArr = array();

        if($pages)
        {
            foreach ($pages as $key => $eachPage) {
                $PageArr['page_number'] = $eachPage['page_number'];
                $PageArr['name']        = $eachPage['name'];

                $PageNameArr[] = $PageArr;
            }
        }
        
        return view('admin.description.add')->with('pageName', $PageNameArr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result             = Page::orderBy('id', 'ASC');
        $pages              = $result->get()->toArray();
        $description_detail = Description::find($id);

        $PageNameArr = array();

        if($pages)
        {
            foreach ($pages as $key => $eachPage) {
                $PageArr['page_number'] = $eachPage['page_number'];
                $PageArr['name']        = $eachPage['name'];

                $PageNameArr[] = $PageArr;
            }
        }        
        
        return view('admin.description.edit')->with([
            'description_detail' => $description_detail,
            'pageName'           => $PageNameArr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update_description()
    {
        $rules = array(
            'name'        => 'required',
            'page_name'   => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Please fill up mandatory fields');
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $id = $this->request->id;
            $name = $this->request->name;

            $name_arr = explode(" ", $name);
            $tmp_name = implode(" ", $name_arr);
            $name = preg_replace('/\s+/', ' ', $name);
            $slug_name = strtolower(str_replace(" ", "-", trim($name)));
            $title_en        = $this->request->title_en;
            $title_esp       = $this->request->title_esp;
            $description_en  = $this->request->description_en;
            $description_esp = $this->request->description_esp;
            $page_name   = $this->request->page_name;
            $status = $this->request->is_active;

            Description::where('id', $id)->update([
                'name'            => $name,
                'slug_name'       => $slug_name,
                'title_en'        => $title_en,
                'title_esp'       => $title_esp,
                'description_en'  => $description_en,
                'description_esp' => $description_esp,
                'page_name'       => $page_name,
                'is_active'       => $status
            ]);

            Session::flash('success', 'Content Updated ');

            return redirect(url('admin/description/edit/' . $id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function save(Request $request)
    { 
        $rules = array(
            'name'        => 'required',            
            'page_name'   => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Please fill up mandatory fields');
            return redirect()->back()->withInput()->withErrors($validator);
        } 
        else {
            try {
                $description            = new Description();
                $description->name      = $this->request->name;
                $description->page_name = $this->request->page_name;
                $description->slug_name = strtolower(str_replace(" ", "-", trim($this->request->name)));
                $description->title_en        = $this->request->title_en;
                $description->title_esp       = $this->request->title_esp;
                $description->description_en  = $this->request->description_en;
                $description->description_esp = $this->request->description_esp;
                $description->is_active       = '1';

                $description->save(); 
                
                Session::flash('success', 'New Content added successfully');
            } catch (\Illuminate\Database\QueryException $ex) {
                Session::flash('error', $ex->getMessage());
            } finally {
                return redirect(url('admin/description'));
            }
        }
    }

    public function delete($id)
    {
        $id = $this->request->id;
        $detail = Description::find($id);
        $detail->delete();
        Session::flash('success', 'Description Deleted Successfully');
        return redirect(url('description'));
    }

    public function pageName()
    {
        $pageNameArr = array(
            "1" => "Home",
            "2" => "Welcome",
            "3" => "Save the Date",
            "4" => "Invite",
            "5" => "Travel Info"        
        );

      return $pageNameArr;
    }

}
