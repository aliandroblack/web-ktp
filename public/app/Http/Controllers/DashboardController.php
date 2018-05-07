<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
// use PHPExcel_Shared_Date, PHPExcel_Style_NumberFormat, PHPExcel_Style_Alignment, PHPExcel_Style_Border, PHPExcel_Style_Fill, PHPExcel_Style_Font, PHPExcel_Style_Color;

class DashboardController extends Controller{
    public function getIndex() {
    	$data['ctlUsers'] = DB::table('ktp_users')
    		->where('U_ID', Session::get('SESSION_USER_ID'))
    		->orderBy('U_ID', 'asc')
    		->get();

    	// return $data;
    	return view('home', $data);
    }
}
