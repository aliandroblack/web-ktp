<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
class ReferenceCategoriController extends Controller
{
    public function getIndex()
    {
        $data['ctlUsers'] = DB::table('dp_users')
            ->where('U_ID', Session::get('SESSION_USER_ID'))
            ->orderBy('U_NAME', 'asc')
            ->get();
        $userId = Session::get('SESSION_USER_ID');
        $category = DB::table("dp_reference_categori")->get();
        $data["ctlCategory"] = $category;

        // return $data;
        return view('category/category', $data);


    }

    public function postCategory()
    {
        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();
        if (null === Input::get("ctName") || trim(Input::get("ctName")) == "") return composeReply("ERROR", trans('generic.emptyCate'));

        $cId = DB::table("dp_reference_categori")->insertGetId(array(
        'CATEG_NAME' => urldecode(Input::get("ctName"))

    ));

        if (isset($cId)) {
            return composeReply("SUCCESS", trans('CATEGORY SUCCESS FULL SAVE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }
    }

    public function putCategory()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();

        if(null === Input::get("ctName") || trim(Input::get("ctName")) == "")return composeReply("ERROR", trans('generic.emptyCategory'));
        if(null === Input::get("ctId") || trim(Input::get("ctId")) == "")return composeReply("ERROR", trans('generic.emptyContactId'));

        $catID=DB::table("dp_reference_categori")->where("CATEG_ID", Input::get("ctId"))->update(array(
            'CATEG_NAME' => urldecode(Input::get("ctName"))));

        if (isset($catID)) {
            return composeReply("SUCCESS", trans('CATEGORY SUCCESS UPDATE'));
        }
        else {

            return composeReply('ERROR', trans('generic.noSession'));
        }
    }

    public function deleteCategory()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();


        if (null === Input::get("id") || trim(Input::get("id")) == "") return composeReply("ERROR", trans('generic.emptyContactId'));

        $ct=DB::table("dp_reference_categori")->where("CATEG_ID", Input::get("id"))->delete();
        if (isset($ct)) {
            return composeReply("SUCCESS", trans('CATEGORY SUCCESS DELETE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }

    }





}
