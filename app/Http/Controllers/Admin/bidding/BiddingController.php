<?php

namespace App\Http\Controllers\Admin\bidding;

use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Models\Property;
use Auth;

class BiddingController extends Controller
{
    public function liveAcutionList(AdminRepository $AdminRepository)
    {
    	$table = new Property;
    	$limit = 10;
    	$where = array('status'=>1, 'is_deleted'=>0);
    	$liveBid = $AdminRepository->getAllByLimitInPaginate($limit, $table, $where);
    	// dd($liveBid);
    	return view('admin.pages.bidding.live', compact('liveBid'));
    }


    public function soldAcutionList()
    {
    	return view('admin.pages.bidding.sold');
    }


    public function expiredAcutionList()
    {
    	return view('admin.pages.bidding.expired');
    }
}
