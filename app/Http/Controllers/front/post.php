<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class post extends Controller
{
    function home(Request $request){
		$data['result']=DB::table('pages')->get();
		return view('front/home',$data);
    }
}
