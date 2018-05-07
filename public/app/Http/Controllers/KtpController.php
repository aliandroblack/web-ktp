<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;

class KtpController extends Controller
{
    public function getIndex()
    {
        $data['ctlUsers'] = DB::table('ktp_users')
            ->where('U_ID', Session::get('SESSION_USER_ID'))
            ->orderBy('U_NAME', 'asc')
            ->get();
        $userId = Session::get('SESSION_USER_ID');
        $ktp = DB::table("ktp_penduduk")
            ->distinct()->get();
          
     
        $data["ctlKtp"] = $ktp;
     
        // return $data;
        return view('news', $data);


    }

    public function postNews()
    {
        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('ktp_users')->where('U_ID', $userId)->first();
       
        if (null === Input::get("ktpNIK") || trim(Input::get("ktpNIK")) == "") return composeReply("ERROR", trans('generic.emptyktpName'));
        if (null === Input::get("ktpName") || trim(Input::get("ktpName")) == "") return composeReply("ERROR", trans('generic.emptyktpName'));
         if (null === Input::get("ktpAlamat") || trim(Input::get("ktpAlamat")) == "") return composeReply("ERROR", trans('generic.emptyAlamat'));
        if (null === Input::get("ktpNoTelp") || trim(Input::get("ktpNoTelp")) == "") return composeReply("ERROR", trans('generic.emptyNotelp'));
         if (null === Input::get("ktpJenisKel") || trim(Input::get("ktpJenisKel")) == "") return composeReply("ERROR", trans('generic.emptyJenisKel'));
      
        if(isset($_FILES['itmImg'])) {
            $fileName = $_FILES['itmImg']['name'];
            $fileSize = $_FILES['itmImg']['size'];
            $fileTmp = $_FILES['itmImg']['tmp_name'];
            $fileType = $_FILES['itmImg']['type'];
            $a = explode(".", $_FILES["itmImg"]["name"]);
            $fileExt = strtolower(end($a));

            $arrFileExt = array("jpg","jpeg","png","JPG","JPEG","PNG");
            if(isset($fileName) && trim($fileName) != "") {
                if(in_array($fileExt,$arrFileExt)=== false)     return composeReply2("ERROR", trans('generic.errorImageformat'));
                if($fileSize > 2048000)     return composeReply("ERROR", trans('generic.errorImageSize'));

                $uploadFile = "uploads/".substr(md5(date("YmdHis")),0,10).".".$fileExt;
                if(move_uploaded_file($fileTmp, $uploadFile) == FALSE) {
                    return composeReply('ERROR', trans('generic.errorImageUpload'));
                }
            }
            else {
                return composeReply("ERROR", trans('generic.errorImageUpload'));
            }
        }else{
            $uploadFile = 'uploads/noimg.jpg';
        }

        $newsId = DB::table("ktp_penduduk")->insertGetId(array(
            'KTP_NIK' => Input::get("ktpName"),
            'NEWS_HEADLINE' => urldecode(Input::get("nwsName")),
            'NEWS_CONTENT' => Input::get("nwsContent"),
            'NEWS_IMG_PATH' => $uploadFile,
            'NEWS_DATE' => date("Y-m-d H:i:s"),
            'NEWS_STATUS' => Input::get("nwsStatus"),
            'U_ID' =>$userId


        ));

        if (isset($newsId)) {
            return composeReply("SUCCESS", trans('NEWS SUCCESS FULL SAVE'));
        } else {
            return composeReply("ERROR", trans('NEWS FAILED SAVE'));
        }
    }

    public function postNewst()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();


        if(null === Input::get("itmId") || trim(Input::get("itmId")) == "")return composeReply("ERROR", trans('generic.newsId'));
        if(null === Input::get("nwsName") || trim(Input::get("nwsName")) == "")return composeReply("ERROR", trans('generic.name'));  
        if(null === Input::get("nwsContent") || trim(Input::get("nwsContent")) == "")return composeReply("ERROR", trans('generic.Isi'));

        if(null === Input::get("nwsStatus") || trim(Input::get("nwsStatus")) == "")return composeReply("ERROR", trans('generic.Status'));



        if(isset($_FILES['itmImg'])) {
        $fileName = $_FILES['itmImg']['name'];
        $fileSize = $_FILES['itmImg']['size'];
        $fileTmp = $_FILES['itmImg']['tmp_name'];
        $fileType = $_FILES['itmImg']['type'];
        $a = explode(".", $_FILES["itmImg"]["name"]);
        $fileExt = strtolower(end($a));

        $arrFileExt = array("jpg","jpeg","png","JPG","JPEG","PNG");
        if(isset($fileName) && trim($fileName) != "") {
                    if(in_array($fileExt,$arrFileExt)=== false)     return composeReply2("ERROR", trans('generic.errorImageFormat'));
                    if($fileSize > 2048000)     return composeReply("ERROR", trans('generic.errorImageSize'));

                    $uploadFile = "uploads/-new".substr(md5(date("YmdHis")),0,7).".".$fileExt;
                    if(move_uploaded_file($fileTmp, $uploadFile) == FALSE) {    
                        return composeReply('ERROR', trans('generic.errorImageUpload'));
                    }
                }
                else {
                    return composeReply("ERROR", trans('generic.fileUploadFailed'));
                }
            }
            else {
                $uploadFile = 'uploads/noimg.jpg';
            }


            
        $newstid=DB::table("dp_news")->where("NEWS_ID", Input::get("itmId"))->update(array(
            'NEWS_CATEG_ID' => urldecode(Input::get("nwsCategNameEdit")),
            'NEWS_HEADLINE' => urldecode(Input::get("nwsName")),
            'NEWS_CONTENT' => Input::get("nwsContent"),
            'NEWS_IMG_PATH' =>$uploadFile,
            'NEWS_DATE' => date("Y-m-d H:i:s"),
            'NEWS_STATUS' => Input::get("nwsStatus")

        ));

        if (isset($newstid)) {
            return composeReply("SUCCESS", trans('Berita SUCCESS UPDATE'));
        }
        else {

            return composeReply('ERROR', trans('generic.noSession'));
        }
    }

    public function deleteNews()
    {

        $userId = Session::get('SESSION_USER_ID', '');
        $userData = DB::table('dp_users')->where('U_ID', $userId)->first();


        if (null === Input::get("id") || trim(Input::get("id")) == "") return composeReply("ERROR", trans('generic.emptyContactId'));

        $ct=DB::table("dp_news")->where("NEWS_ID", Input::get("id"))->delete();
        if (isset($ct)) {
            return composeReply("SUCCESS", trans('Berita SUCCESS DELETE'));
        } else {
            return composeReply("ERROR", trans('generic.failedAddContact'));
        }

    }





}
