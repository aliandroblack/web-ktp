<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
// use PHPExcel_Shared_Date, PHPExcel_Style_NumberFormat, PHPExcel_Style_Alignment, PHPExcel_Style_Border, PHPExcel_Style_Fill, PHPExcel_Style_Font, PHPExcel_Style_Color;

class UserMgmtController extends Controller{
    public function getIndex() {
    	$data['ctlRole'] = DB::table('trv_users_groups')
    		->where('U_ID', Session::get('SESSION_USER_ID'))
    		->orderBy('GROUP_ROLE', 'asc')
    		->get();
    		
    	$userId = Session::get('SESSION_USER_ID');
    	$data['ctlProfile'] = DB::table('trv_users')->where('U_ID', $userId)->first();

    	// return $data;
    	return view('profile', $data);
    }
}
