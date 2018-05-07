<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
// use PHPExcel_Shared_Date, PHPExcel_Style_NumberFormat, PHPExcel_Style_Alignment, PHPExcel_Style_Border, PHPExcel_Style_Fill, PHPExcel_Style_Font, PHPExcel_Style_Color;

class ProfileController extends Controller{
    public function getIndex() {
    	$data['ctlUsers'] = DB::table('dp_users')
    		->where('U_ID', Session::get('SESSION_USER_ID'))
    		->orderBy('U_ID', 'asc')
    		->get();
    		
    	$userId = Session::get('SESSION_USER_ID');
    	$data['ctlProfile'] = DB::table('dp_users')->where('U_ID', $userId)->first();

    	// return $data;
    	return view('profile', $data);
    }

    public function postUpdate() {
        $id = Input::get('id');
        $namaLengkap = Input::get('namaLengkap');
        $passwordLama = Input::get('passwordLama');
        $passwordBaru = Input::get('passwordBaru');
        $passwordBaru2 = Input::get('passwordBaru2');
        $nomorPonsel = Input::get('nomorPonsel');
        $facebookID = Input::get('facebookID');
        $googleID = Input::get('googleID');

        if(!isset($id) || empty($id)) return composeReply('ERROR', 'ID salah, silahkan refresh halaman terlebih dulu');
        if(!isset($namaLengkap) || empty($namaLengkap)) return composeReply('ERROR', 'Silahkan isi nama lengkap anda terlebih dulu');
        if(!isset($nomorPonsel) || empty($nomorPonsel)) return composeReply('ERROR', 'Silahkan isi nama lengkap anda terlebih dulu');

        if(!empty($passwordBaru) && !empty($passwordBaru2) && !empty($passwordLama)){
            if($passwordBaru != $passwordBaru2){
                return composeReply('ERROR', 'Maaf, password baru harus sama, silahkan diulangi kembali');
            }else{
                $cekUser = DB::table('dp_users')->where('U_ID', $id)->where('U_PASSWORD_HASH', md5($id.$passwordLama))->first();
                if(count($cekUser) > 0){
                    $updateData = DB::table('dp_users')->where('U_ID', $id)
                        ->update([
                            'U_NAME' => $namaLengkap,
                            'U_PHONE' => $nomorPonsel,
                            'U_PASSWORD_HASH' => md5($id.$passwordBaru),
                            'SYS_UPDATE_TIME' => date('Y-m-d H:i:s'),
                            'SYS_UPDATE_USER' => $id
                        ]);
                    return composeReply('SUCCESS', 'Proses update data berhasil diproses');
                }else{
                    return composeReply('ERROR', 'Password lama yang anda isikan salah, silahkan diulangi kembali');
                }
            }
        }else{
            $updateData = DB::table('dp_users')->where('U_ID', $id)
                ->update([
                    'U_NAME' => $namaLengkap,
                    'U_PHONE' => $nomorPonsel,
                    'SYS_UPDATE_TIME' => date('Y-m-d H:i:s'),
                    'SYS_UPDATE_USER' => $id
                ]);
            return composeReply('SUCCESS', 'Proses update data berhasil diproses2');
        }
    }

    public function postAvatar() {
        $userId = Session::get('SESSION_USER_ID', '');  

        if (empty($_FILES['imageAvatar']))       return composeReply2("ERROR", "Harap sertakan file gambar untuk diunggah/upload");

        if(isset($_FILES['imageAvatar'])) {
            $fileName = $_FILES['imageAvatar']['name'];
            $fileSize = $_FILES['imageAvatar']['size'];
            $fileTmp = $_FILES['imageAvatar']['tmp_name'];
            $fileType = $_FILES['imageAvatar']['type'];
            $a = explode(".", $_FILES["imageAvatar"]["name"]);
            $fileExt = strtolower(end($a));

            $arrFileExt = array("jpg","jpeg","png","JPG","JPEG","PNG");
            if(isset($fileName) && trim($fileName) != "") {
                //if(in_array($fileExt,$arrFileExt)=== false)     return composeReply2("ERROR","Harap pilih file JPG atau PNG");
                if($fileSize > 2048000)     return composeReply2("ERROR","Harap pilih file dengan ukuran max. 2 MB");

                $namaFile = substr(md5(date("YmdHis")),0,10).".".$fileExt;
                $uploadFile = "uploads/images/profile/".$namaFile;
                if(move_uploaded_file($fileTmp,$uploadFile) == TRUE) {    
                    $updateAvatar = DB::table("dp_users")->where('U_ID', $userId)->update([
                        'U_AVATAR_PATH' => $namaFile
                    ]);
                    
                    if(isset($updateAvatar) && $updateAvatar > 0) {   
                        return composeReply2("SUCCESS", "File telah diunggah/upload");
                    }
                    else {
                        return composeReply2("ERROR", "Proses upload GAGAL");
                    }
                }
                else {
                    return composeReply2("ERROR", "Proses upload GAGAL");
                }
            }
            else {
                return composeReply2("ERROR", "Proses upload GAGAL");
            }
        }
        else {
            return composeReply2("ERROR", "Harap sertakan file untuk diunggah/upload");       
        }
    }
}


































