@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<a href="/admin/post/add" class="btn btn-success" >Add Post</a>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
					 {{session('msg')}}
						<div class="card-box table-responsive">
						{{$bhawana}}
						   <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">
							  <thead>
								 <tr>
									<th>id</th>
									<th>Title</th>
									<th>Short-Desc</th>
									<th>Long-desc</th>
									<th>image</th>
									<th>Post-date</th>
									<th>Status</th>
									<th>Added-on</th>
									<th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  @foreach($result  as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->title}}</td>
									<td>{{$list->short_desc}}</td>
									<td>{{$list->long_desc}}</td>
									<td><img class="img-thumbnail" src="{{asset($list->image)}}" width="50px" alt=""></td>
									<td>{{$list->post_date}}</td>
									<td>{{$list->status}}</td>
									<td>{{$list->added_on}}</td>
									<td>
									<a href="{{url('admin/post/edit/'.$list->id)}}" class="btn btn-info">Edit</a>
									<a href="{{url('admin/post/delete/'.$list->id)}}" class="btn btn-danger">Delete</a>
									</td>
									
								 </tr>
								@endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection