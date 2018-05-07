<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;

class JobVacanController extends Controller
{
   public function getIndex()
     {
        $data['ctlUsers'] = DB::table('dp_users')
            ->where('U_ID', Session::get('SESSION_USER_ID'))
            ->orderBy('U_NAME', 'asc')
            ->get();
        $userId = Session::get('SESSION_USER_ID');
        $vacan = DB::table("dp_vacancies")->get();
        $data["ctlVacan"] = $vacan;

        // return $data;
        return view('vacancies', $data);


    }

    public function postVacancies() 
    {
    	$userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if (null === Input::get("vacName") || trim(Input::get("vacName")) == "") return composeReply("ERROR", trans('generic.emptyName'));
        if (null === Input::get("vacContent") || trim(Input::get("vacContent")) == "") return composeReply("ERROR", trans('generic.emptyName'));
        if (null === Input::get("vacStatus") || trim(Input::get("vacStatus")) == "") return composeReply("ERROR", trans('generic.emptyName'));


        $vacid = DB::table("dp_vacancies")->insertGetId(array(
            'VAC_NAME' => urldecode(Input::get("vacName")),
            'VAC_DATE' => date("Y-m-d H:i:s"),
            'VAC_CONTENT' => Input::get("vacContent"),          
            'VAC_STATUS' => Input::get("vacStatus"),
            'U_ID' =>$userId


        ));

        if (isset($vacid)) {
            return composeReply("SUCCESS", trans('Job Vacancies SUCCESS FULL SAVE'));
        } else {
            return composeReply("ERROR", trans('PROMOSI ERROR'));
        }
    }



     public function postVacan()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if(null === Input::get("itmId") || trim(Input::get("itmId")) == "")return composeReply("ERROR", trans('generic.eventid'));
        if(null === Input::get("vacName") || trim(Input::get("vacName")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("vacContent") || trim(Input::get("vacContent")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("vacStatus") || trim(Input::get("vacStatus")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));

        $VACSID=DB::table("dp_vacancies")->where("VAC_ID", Input::get("itmId"))->update(array(
            'VAC_NAME' => urldecode(Input::get("vacName")),
            'VAC_CONTENT' => Input::get("vacContent"),
            'VAC_DATE' => date("Y-m-d H:i:s"),
            'VAC_STATUS' => Input::get("vacStatus")

        ));

        if (isset($VACSID)) {
            return composeReply("SUCCESS", trans('Vacancies SUCCESS UPDATE'));
        }
        else {

            return composeReply('ERROR', trans('generic.noSession'));
        }
    }


    public function deleteVacancies()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();


        if (null === Input::get("id") || trim(Input::get("id")) == "") return composeReply("ERROR", trans('generic.emptyContactId'));

        $dp_promotion=DB::table("dp_vacancies")->where("VAC_ID", Input::get("id"))->delete();
        if (isset($dp_promotion)) {
            return composeReply("SUCCESS", trans('VACANCIES SUCCESS DELETE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }

    }

}
