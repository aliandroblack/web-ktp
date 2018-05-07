<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Input, Session, Redirect;
class ApiNewsController extends Controller
{
    public function index()
    {
        $userId = Session::get('SESSION_USER_ID');
        $id = Input::get('detail');
        if(null == $id || empty($id) || $id == ''){
            $news = DB::table("dp_news")
                ->select('dp_news.*', 'dp_reference_categori.CATEG_NAME')
                ->join('dp_reference_categori', 'dp_news.NEWS_CATEG_ID', '=', 'dp_reference_categori.CATEG_ID')
                ->get();
        }else{
            $news = DB::table("dp_news")
                ->select('dp_news.*', 'dp_reference_categori.CATEG_NAME')
                ->join('dp_reference_categori', 'dp_news.NEWS_CATEG_ID', '=', 'dp_reference_categori.CATEG_ID')
                ->where('dp_news.NEWS_ID', $id)
                ->first();            
        }

        // return $data;
       return composeReply2('SUCCESS', 'isi berita', $news);
    }
}
