@extends('admin/layout.layout')

@section('page_title','Manage Post')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Post</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                              <form class="form-horizontal form-label-left" method="post" action="{{url('admin/page/submit')}} ">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control"  name="name">
                                       @error('name')
                                   <span class="text-danger" > {{$message}}</span>
                                    @enderror
                                    </div>
                                      
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="slug"></textarea>
                                        @error('slug')
                                   <span class="text-danger" > {{$message}}</span>
                                    @enderror
                                    </div>
                                     
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="description"></textarea>
                                        @error('description')
                                   <span class="text-danger" > {{$message}}</span>
                                    @enderror
                                    </div>
                                   
                                 </div>
                                
                                 
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" name="status" class="form-control" >
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Added-on</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" name="added_on" class="form-control" >
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