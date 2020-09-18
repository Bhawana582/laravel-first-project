@extends('admin/layout/layout')
@section('page_title','Contact Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Page</h4>
			<a href="/admin/contact/add" class="btn btn-success" >Add Contact</a>
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
						   <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">
							  <thead>
								 <tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Message</th>
									<th>Added-on</th>
									<th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  @foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->name}}</td>
									<td>{{$list->email}}</td>
									<td>{{$list->mobile}}</td>
									<td>{{$list->message}}</td>
									<td>{{$list->added_on}}</td>
									<td>
									<a href="{{url('admin/contact/edit/'.$list->id)}}" class="btn btn-info">Edit</a>
									<a href="{{url('admin/contact/delete/'.$list->id)}}" class="btn btn-danger">Delete</a>
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