@extends('layouts.admin1')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <h1>Categories</h1>

    <div class="col-sm-6">
   
        {!! Form::model($category , ['method'=>'PATCH','action'=>['AdminCategoriesController@update', $category->id ]]) !!}

        <div class="form-group">
            
            {!! Form::label('name', 'Name : ') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}
            
        </div>

        {{--  BOTON PARA actualizar  --}}
        <div class="form-group">
            
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
            
        </div>

        {!! Form::close() !!}

    </div>
    <div class="col-sm-6">
    {{-- Eliminar  --}}
   
        {!! Form::model($category , ['method'=>'DELETE','action'=>['AdminCategoriesController@destroy', $category->id ]]) !!}

        {{--  BOTON PARA ELIMINAR  --}}
        <div class="form-group">
            
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
            
        </div>

        {!! Form::close() !!}

    </div>

@stop