<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;

class PromotionController extends Controller
{
    //
    public function getIndex()
     {
        $data['ctlUsers'] = DB::table('dp_users')
            ->where('U_ID', Session::get('SESSION_USER_ID'))
            ->orderBy('U_NAME', 'asc')
            ->get();
        $userId = Session::get('SESSION_USER_ID');
        $promo = DB::table("dp_promotion")->get();
        $data["ctlPromotion"] = $promo;

        // return $data;
        return view('promotion', $data);


    }
    public function postPromotion() 
    {
    	$userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if (null === Input::get("prtName") || trim(Input::get("prtName")) == "") return composeReply("ERROR", trans('generic.emptyName'));
        if (null === Input::get("prtContent") || trim(Input::get("prtContent")) == "") return composeReply("ERROR", trans('generic.emptyName'));
        if (null === Input::get("prtStatus") || trim(Input::get("prtStatus")) == "") return composeReply("ERROR", trans('generic.emptyName'));


        $proid = DB::table("dp_promotion")->insertGetId(array(
            'PRO_NAME' => urldecode(Input::get("prtName")),
            'PRO_DATE' => date("Y-m-d H:i:s"),
            'PRO_CONTENT' => Input::get("prtContent"),          
            'PRO_STATUS' => Input::get("prtStatus"),
            'U_ID' =>$userId


        ));

        if (isset($proid)) {
            return composeReply("SUCCESS", trans('PROMOTION SUCCESS FULL SAVE'));
        } else {
            return composeReply("ERROR", trans('PROMOSI ERROR'));
        }
    }


    public function postPromo()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if(null === Input::get("itmId") || trim(Input::get("itmId")) == "")return composeReply("ERROR", trans('generic.eventid'));
        if(null === Input::get("prtName") || trim(Input::get("prtName")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("prtContent") || trim(Input::get("prtContent")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("prtStatus") || trim(Input::get("prtStatus")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));

        $PRID=DB::table("dp_promotion")->where("PRO_ID", Input::get("itmId"))->update(array(
            'PRO_NAME' => urldecode(Input::get("prtName")),
            'PRO_Content' => Input::get("prtContent"),
            'PRO_Date' => date("Y-m-d H:i:s"),
            'PRO_STATUS' => Input::get("prtStatus")

        ));

        if (isset($PRID)) {
            return composeReply("SUCCESS", trans('PROMOSI SUCCESS UPDATE'));
        }
        else {

            return composeReply('ERROR', trans('generic.noSession'));
        }
    }

      public function deletePromotion()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();


        if (null === Input::get("id") || trim(Input::get("id")) == "") return composeReply("ERROR", trans('generic.emptyContactId'));

        $dp_promotion=DB::table("dp_promotion")->where("PRO_ID", Input::get("id"))->delete();
        if (isset($dp_promotion)) {
            return composeReply("SUCCESS", trans('PROMOSI SUCCESS DELETE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }

    }

}
