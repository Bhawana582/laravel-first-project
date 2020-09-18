<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Post extends Controller
{
    function listing(Request $request){
		$result=DB::table('posts')->get();
		$bhawana='bhawana kc';
		return view('admin.post.list',compact('result','bhawana'));
	}
	
	function submit(Request $request){
		$request->validate([
			'title'=>'required',
			'short_desc'=>'required',
			'long_desc'=>'required',
			'image'=>'required',
			'post_date'=>'required'
		]);
		
		if($request->hasFile('image')){
   		$extension = $request->image->getClientOriginalExtension();
		$name = basename($request->image->getClientOriginalName(), $extension).time();
		$name = $name.$extension;
		$path =  $request->image->move('uploads/post',$name);  

		}
		
		
		$data=array(
			'title'=>$request->input('title'),
			'short_desc'=>$request->input('short_desc'),
			'long_desc'=>$request->input('long_desc'),
			'image'=>$path,
			'post_date'=>$request->input('post_date'),
			'status'=>1,
			'added_on'=>date('Y-m-d h:i:s')
		);
		
		DB::table('posts')->insert($data);
		$request->session()->flash('msg','Post saved');
		return redirect('/admin/post/list');
	}
	
	
    function delete(Request $request,$id){
		DB::table('posts')->where('id',$id)->delete();
		$request->session()->flash('msg','Post delete');
		return redirect('/admin/post/list');
	}
	
	function edit(Request $request,$id){
		$data['result']=DB::table('posts')->where('id',$id)->get();
		return view('admin.post.edit',$data);
	}
	
	function update(Request $request,$id){
		$request->validate([
			'title'=>'required',
			'short_desc'=>'required',
			'long_desc'=>'required',
			'image'=>'required',
			'post_date'=>'required'
		]);

			if($request->hasFile('image')){
   		$extension = $request->image->getClientOriginalExtension();
		$name = basename($request->image->getClientOriginalName(), $extension).time();
		$name = $name.$extension;
		$path =  $request->image->move('uploads/post',$name);  
	 }
			
		$data=array(
			'title'=>$request->input('title'),
			'short_desc'=>$request->input('short_desc'),
			'long_desc'=>$request->input('long_desc'),
			'image'=>$path,
			'post_date'=>$request->input('post_date'),
			'status'=>1,
			'added_on'=>date('Y-m-d h:i:s')
		);
		
		// if($request->hasfile('image')){
		// 	$image=$request->file('image')->store('public/post');
		// 	$image=$request->file('image');
		// 	$ext=$image->extension();
		// 	$file=time().'.'.$ext;
		// 	$image->storeAs('/public/post',$file);
			
		// 	$data['image']=$file;
		// }

		
		DB::table('posts')->where('id',$id)->update($data);
		$request->session()->flash('msg','Post updated');
		return redirect('/admin/post/list');
	
	}
}