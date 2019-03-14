@extends('layouts.app')

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>

@if(isset($updated))
    @if($updated==TRUE)
    
    <div class="alert alert-success" role="alert">
     The post edited successfully!
    </div>
      
    @endif
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td>{{$post->created_at->toDateString() }}</td>
      <td>
        <a href="{{route('posts.edit',[$post->id])}}" class="btn btn-secondary"> edit</a>
        <a href="{{route('posts.show',[$post->id])}}" class="btn btn-primary"> View</a> 
        <form action="{{route('posts.destroy',[$post->id])}}" method="POST" >
        @csrf
          @method("DELETE")
          <input  type="submit" class="btn btn-danger" value="Delete" onclick="return confirm ('Do you want delet this post')">
        </form>
    </td>
       
    </tr>
    @endforeach

  </tbody>
</table>
{{$posts->links()}}
@endsection