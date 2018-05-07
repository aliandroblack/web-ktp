<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;

class ApiPromotionController extends Controller
{
    //
    public function index()
     {
        $userId = Session::get('SESSION_USER_ID');
        $id  = Input::get('detail');
        if(null == $id || empty($id) || $id == ''){
            $promo = DB::table("dp_promotion")
                ->select('dp_promotion.*') ->get();
        }else{
            $promo = DB::table("dp_promotion")
                ->select('dp_promotion.PRO_ID','dp_promotion.PRO_NAME','dp_promotion.PRO_DATE','dp_promotion.PRO_CONTENT','dp_promotion.U_ID')
                ->where('dp_promotion.PRO_ID', $id)
                ->first();            
        }

        // return $data;
       return composeReply2('SUCCESS', 'isi Promosi', $promo);

    }    
}