<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
class EventController extends Controller
{
    public function getIndex()
    {
        $data['ctlUsers'] = DB::table('dp_users')
            ->where('U_ID', Session::get('SESSION_USER_ID'))
            ->orderBy('U_NAME', 'asc')
            ->get();
        $userId = Session::get('SESSION_USER_ID');
        $event = DB::table("dp_events")->get();
        $data["ctlEvents"] = $event;

        // return $data;
        return view('events', $data);


    }

    public function postEvents()
    {
        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if (null === Input::get("evtName") || trim(Input::get("evtName")) == "") return composeReply("ERROR", trans('generic.emptyName'));


        $evId = DB::table("dp_events")->insertGetId(array(
            'EVT_TITLE' => urldecode(Input::get("evtName")),
            'EVT_CONTENT' => Input::get("evtIsi"),
            'EVT_DATE' => date("Y-m-d H:i:s"),
            'EVT_STATUS' => Input::get("evtStatus"),
            'U_ID' =>$userId


        ));

        if (isset($evId)) {
            return composeReply("SUCCESS", trans('EVENT SUCCESS FULL SAVE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }
    }

    public function postEvent()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if(null === Input::get("itmId") || trim(Input::get("itmId")) == "")return composeReply("ERROR", trans('generic.eventid'));
        if(null === Input::get("evtName") || trim(Input::get("evtName")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("evtIsi") || trim(Input::get("evtIsi")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("evtStatus") || trim(Input::get("evtStatus")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));

        $evID=DB::table("dp_events")->where("EVT_ID", Input::get("itmId"))->update(array(
            'EVT_TITLE' => urldecode(Input::get("evtName")),
            'EVT_CONTENT' => Input::get("evtIsi"),
            'EVT_DATE' => date("Y-m-d H:i:s"),
            'EVT_STATUS' => Input::get("evtStatus")

        ));

        if (isset($evID)) {
            return composeReply("SUCCESS", trans('EVENT SUCCESS UPDATE'));
        }
        else {

            return composeReply('ERROR', trans('generic.noSession'));
        }
    }

    public function deleteEvents()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();


        if (null === Input::get("id") || trim(Input::get("id")) == "") return composeReply("ERROR", trans('generic.emptyContactId'));

        $ct=DB::table("dp_events")->where("EVT_ID", Input::get("id"))->delete();
        if (isset($ct)) {
            return composeReply("SUCCESS", trans('EVENTS SUCCESS DELETE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }

    }





}
