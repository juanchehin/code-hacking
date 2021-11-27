@extends('layouts.admin1')

@section('content')

    <h1>Edit Users</h1>

    <div class="row">

        <div class="col-sm-3">
            <img height="200" src="{{$user->photo ? $user->photo->file :  'http://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
        
            {!! Form::model($user,['method'=>'PATCH','route'=> ['users.update', $user ],'files'=>true]) !!}

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
                {!! Form::select('role_id',$roles,['class'=>'form-control']) !!}
                
            </div>

            <div class="form-group">
                
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null ,['class'=>'form-control']) !!}
                
            </div>
        
            <div class="form-group">
                
                {!! Form::label('photo_id', 'Carga una imagen : ') !!} 
                {!! Form::file('photo_id', null ,['class'=>'form-control']) !!}
                
            </div>

            <div class="form-group">
                
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', array(1=>'Active', 0=>'Not Active'), 0 ,['class'=>'form-control']) !!}
                
            </div>
            {{--  BOTON PARA GUARDAR  --}}
            <div class="form-group">
                
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
                
            </div>
                        
            {!! Form::close() !!}

            {{--  Formulario para eliminar  --}}
            {!! Form::open(['method'=>'DELETE','action'=> ['AdminUserController@destroy',$user->id ]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        {{--  Cartel de errores  --}}
        @include('includes.form_error')
    </div>

@stop
    
