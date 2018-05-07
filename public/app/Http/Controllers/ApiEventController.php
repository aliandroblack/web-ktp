<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
class ApiEventController extends Controller
{
    public function index()
    {
       
       $userId = Session::get('SESSION_USER_ID');
        $id  = Input::get('detail');
        if(null == $id || empty($id) || $id == ''){
            $event = DB::table("dp_events")
                ->select('dp_events.*') ->get();
        }else{
            $event = DB::table("dp_events")
                ->select('dp_events.EVT_ID','dp_events.EVT_TITLE','dp_events.EVT_DATE','dp_events.EVT_CONTENT','dp_events.U_ID')
                ->where('dp_events.EVT_ID', $id)
                ->first();            
        }
        // return $data;
       return composeReply2('SUCCESS', 'isi event', $event);

    }
}
