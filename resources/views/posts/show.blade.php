@extends('layouts.app')

 @section('content')
 <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
<div class="card">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title :- {{$post->title}}</h5>
    <h6 class="card-title">Description</h6>
    <p class="card-text">{{$post->description}}</p>
   
  </div>
</div>
<div class="card">
  <div class="card-header">
    Post Creator info
  </div>
  <div class="card-body">
    <h5 class="card-title">Name :- {{$post->user->name}}</h5>
    <h5 class="card-title">Email :- {{$post->user->email}}</h5>
    <h5 class="card-title">Created at :- {{$post->created_at->format('l jS \\of F Y h:i:s A')  }}</h5>
    
   
   
  </div>
</div>
@endsection
     