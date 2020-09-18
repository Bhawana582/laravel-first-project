@extends('admin/layout.layout')

@section('page_title','Manage Post')

@section('container')
   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Contacts</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                              <form class="form-horizontal form-label-left" method="post" action="{{url('/admin/contact/update/'.$result['0']->id)}}" >
								@csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" name="name" value="{{$result['0']->name}}">
									   @error('name')
									   <span class="field_error">{{$message}}</span>
									   @enderror
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="email">{{$result['0']->email}}</textarea>
									   @error('email')
									   <span class="field_error">{{$message}}</span>
									   @enderror
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Mobile</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="mobile">{{$result['0']->mobile}}</textarea>
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Message</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="message">{{$result['0']->message}}</textarea>
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Added_on</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="added_on">{{$result['0']->added_on}}</textarea>
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection