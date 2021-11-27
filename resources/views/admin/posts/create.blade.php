@extends('layouts.admin1')


@section('content')

@include('includes.tinyeditor')

    <h1>Create Post</h1>

    <div class="row">
   
        {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}

        <div class="form-group">
            
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null,['class'=>'form-control']) !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('category_id', 'Category : ') !!}
            {!! Form::select('category_id', [''=>'Chosse Categories'] + $categories ,null,['class'=>'form-control']) !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('photo_id', 'Photo : ') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            
        </div>

        <div class="form-group">
            
            {!! Form::label('body', 'body :') !!}
            {!! Form::textarea('body', null ,['class'=>'form-control']) !!}
            
        </div>

        {{--  BOTON PARA ENVIAR  --}}
        <div class="form-group">
            {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}
        </div>

        
        {!! Form::close() !!}

    </div>

    <div class="row">
        {{--  Cartel de errores  --}}
        @include('includes.form_error')
    </div>




@stop