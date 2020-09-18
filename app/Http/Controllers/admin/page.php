<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class page extends Controller
{
    
    function listing(Request $request){
		$data['result']=DB::table('pages')->get();
		return view('admin.page.list',$data);
    }
    
    function submit(Request $request){
        $data=array(
            'name'=>$request->input('name'),
			'slug'=>$request->input('slug'),
			'description'=>$request->input('description'),
			'status'=>1,
			'added_on'=>date('Y-m-d h:i:s')
		);
		
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

		DB::table('pages')->insert($data);
		$request->session()->flash('msg','Page saved');
		return redirect('/admin/page/list');
    }

    function delete(Request $request,$id){
        DB::table('pages')->where('id',$id)->delete();
		$request->session()->flash('msg','Page delete');
		return redirect('/admin/page/list');
    }

    function edit(Request $request,$id){
       $data['result']=DB::table('pages')->where('id',$id)->get();
		return view('admin.page.edit',$data);
    }
    function update(Request $request,$id){
      $request->validate([
			'name'=>'required',
            'description'=>'required',
		]);
			
		$data=array(
			'name'=>$request->input('name'),
			'slug'=>$request->input('slug'),
			'description'=>$request->input('description')
		);

		
		DB::table('pages')->where('id',$id)->update($data);
		$request->session()->flash('msg','Page updated');
		return redirect('/admin/page/list');
	
    }



}
