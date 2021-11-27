@extends('layouts.admin1')

@section('content')

    <h1>Create Users</h1>
    
    {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true]) !!}

    <div class="form-group">
        
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null,['class'=>'form-control']) !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null,['class'=>'form-control']) !!}
        
    </div>

    <div class="form-group">
        
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id',[''=>'Chosse Options'] + $roles,['class'=>'form-control']) !!}
        
    </div>

    <div class="form-group">
        
        {!! Form::label('is_active', 'Status') !!}
        {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0 ,['class'=>'form-control']) !!}
        
    </div>

    <div class="form-group">
        
        {!! Form::label('photo_id', 'Carga una imagen : ') !!} 
        {!! Form::file('photo_id', null ,['class'=>'form-control']) !!}
        
    </div>

    <div class="form-group">
        
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', array(1=>'Active', 0=>'Not Active'), 0 ,['class'=>'form-control']) !!}
        
    </div>
    {{--  BOTON PARA ENVIAR  --}}
    <div class="form-group">
        
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        
    </div>

    
    {!! Form::close() !!}

{{--  Cartel de errores  --}}
@include('includes.form_error')

@stop
    
