@extends('layouts.admin1')


@section('content')

    <h1>Posts</h1>

    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<table class="table">
    <thead>
      <tr >
        <th scope="col">Id</th>
        <th scope="col">Photo</th>
        <th scope="col"> Owner </th>
        <th scope="col">Category</th>
        {{--  <th scope="col">Photo</th>  --}}
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Post link</th> 
        <th scope="col">Comments</th>
        <th scope="col">Created at</th>
        <th scope="col">Update at</th>
      </tr>
    </thead>
    <tbody>
      @if($posts)

      @foreach($posts as $post)

      <tr> 
        <th>{{ $post->id}}</th>
        <td><img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
        <td><a href="{{route('posts.edit', $post->id )}}"> {{ $post->user->name}} </a></td>
        <td>{{ $post->category ? $post->category->name : 'Uncategorize'}} </td>
        <td>{{ $post->title}}</td>
        <td>{{ str_limit($post->body,30) }}</td>
        <td><a href="{{route('post', $post->slug )}}">View Post </a> </td>
        <td><a href="{{route('comments.show', $post->id )}}"> </a> </td>
        <td>{{ $post->created_at}}</td>
        <td>{{ $post->updated_at}}</td>
      </tr>

      @endforeach

      @endif
    </tbody>
  </table>


@stop