@extends('front/layout/layout')
@section('title','Home')
@section('container')

@foreach($result as $list)
   <div class="post-preview">
          <a href="{{url('/'.$list->id)}}">
            <h2 class="post-title">
              {{$list->name}}
            </h2>
            <h3 class="post-subtitle">
              {{$list->description}}
            </h3>
          </a>
          <p class="post-meta">{{$list->added_on}}</p>
        </div>
        @endforeach

@endsection