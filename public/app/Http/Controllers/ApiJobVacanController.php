<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;

class ApiJobVacanController extends Controller
{
   public function index()
     {
         
       $userId = Session::get('SESSION_USER_ID');
        $id  = Input::get('detail');
        if(null == $id || empty($id) || $id == '')
        {
            $vacancies = DB::table("dp_vacancies")
                ->select('dp_vacancies.*') ->get();
        }
        else{
            $vacancies = DB::table("dp_vacancies")
                ->select('dp_vacancies.VAC_ID','dp_vacancies.VAC_NAME','dp_vacancies.VAC_DATE','dp_vacancies.VAC_CONTENT','dp_vacancies.U_ID')
                ->where('dp_vacancies.VAC_ID', $id)
                ->first();            
        }
        // return $data;
      return composeReply2('SUCCESS', 'isi Lowongan Kerja', $vacancies);

    }
}