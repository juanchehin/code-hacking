@extends('layouts.admin1')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <h1>Categories</h1>

    <div class="row">

        <div class="col-sm-6">
    
            {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}

            <div class="form-group">
                
                {!! Form::label('name', 'Name : ') !!}
                {!! Form::text('name', null,['class'=>'form-control']) !!}
                
            </div>

            {{--  BOTON PARA ENVIAR  --}}
            <div class="form-group">
                
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                
            </div>

            
            {!! Form::close() !!}

        </div>

        <div class="col-sm-6">

        <table class="table">
            <thead>
                <tr >
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created date</th>
                </tr>
                </thead>
            <tbody>
                @if($categories)

                @foreach($categories as $category)

                <tr> 
                    <th>{{ $category->id}}</th>
                    <td><a href="{{route('categories.edit',$category->id)}}"> {{ $category->name}}</td>
                    <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                </tr>

                @endforeach

                @endif
            </tbody>
            </table>
        </div>
    </div>
@stop