<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect, Hash;
// use PHPExcel_Shared_Date, PHPExcel_Style_NumberFormat, PHPExcel_Style_Alignment, PHPExcel_Style_Border, PHPExcel_Style_Fill, PHPExcel_Style_Font, PHPExcel_Style_Color;

class AuthController extends Controller{
    public function getIndex() {
    	return view('login/login');
    }

    public function postDologin(){
    	$email = Input::get('loginEmail');
    	$password = Input::get('loginPassword');
    	if(!isset($email) || !isset($password)){
    		return Redirect::to('auth')->with('ctlError', 'Silahkan isikan data dengan lengkap');
    	}

    	$cekUser = DB::table('ktp_users')->where('U_ID', $email)->where('U_PASSWORD_HASH', md5($email.$password))->first();
    	if(count($cekUser) > 0){
    		if($cekUser->U_ACCT_STATUS != 'ACCT_ACTIVE'){
    			return Redirect::to('auth')->with('ctlError', 'Anda tidak diperbolehkan login, silahkan hubungi admin kami terlebih dulu. Terimakasih');
    		}

    		/*$role = DB::table('trv_users_groups')->where('U_ID', $cekUser->U_ID)->orderBy('GROUP_ROLE', 'asc')->get();*/
            Session::put('SESSION_USER_NAME', $cekUser->U_NAME);
            Session::put('SESSION_USER_ID', $cekUser->U_ID);
           /* Session::put('SESSION_USER_ROLE', $role);*/

			return Redirect::to('dashboard')
				->with('ctlLogin', $cekUser->U_ID)
				->with('ctlUserName', $cekUser->U_NAME);
    	}else{
    		return Redirect::to('auth')->with('ctlError', 'Silahkan login dengan email dan password yang benar');
    	}
    }

	public function getLogout() {
		Session::flush();
		return Redirect::to('auth')->with('ctlError', 'Anda telah keluar dari sistem');
	}
}
