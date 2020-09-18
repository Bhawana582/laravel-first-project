<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class contact extends Controller
{
    function listing(){
        $data['result']=DB::table('contacts')->get();
		return view('admin.contact.list',$data);

    }

    function submit(Request $request){
        $data=array(
            'name'=>$request->input('name'),
			'email'=>$request->input('email'),
			'mobile'=>$request->input('mobile'),
			'message'=>$request->input('message'),
			'added_on'=>date('Y-m-d h:i:s')
		);
		
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

		DB::table('contacts')->insert($data);
		$request->session()->flash('msg','Page saved');
		return redirect('/admin/contact/list');
    }

    function delete(Request $request,$id){
        DB::table('contacts')->where('id',$id)->delete();
		$request->session()->flash('msg','Contact deleted');
		return redirect('/admin/contact/list');
}

 function edit(Request $request,$id){
       $data['result']=DB::table('contacts')->where('id',$id)->get();
		return view('admin.contact.edit',$data);
    }
     function update(Request $request,$id){
      $request->validate([
			'name'=>'required',
            'email'=>'required',
		]);
			
		$data=array(
			'name'=>$request->input('name'),
			'email'=>$request->input('email'),
			'mobile'=>$request->input('mobile'),
			'message'=>$request->input('message'),
			'added_on'=>date('Y-m-d h:i:s')
		);

		
		DB::table('contacts')->where('id',$id)->update($data);
		$request->session()->flash('msg','Page updated');
		return redirect('/admin/contact/list');
	
    }
}