@extends('layouts.admin1')


@section('content')

  @if(Session::has('delete_user'))
    <p class="bg-danger"> {{session('deleted_user')}} </p>
  @endif

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <h1>Users</h1>

    <table class="table">
        <thead>
          <tr >
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
          @if($users)

          @foreach($users as $user)

          <tr> 
            <th>{{ $user->id}}</th>
            <td><img height="50" src="{{$user->photo ? $user->photo->file :  'http://placehold.it/400x400' }}" alt=""></td>
            <td><a href="{{route('users.edit', $user->id )}}"> {{ $user->name}} </a> </td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->role->name}}</td>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{ $user->created_at}}</td>
            <td>{{ $user->updated_at}}</td>
          </tr>

          @endforeach

          @endif
        </tbody>
      </table>
@stop
