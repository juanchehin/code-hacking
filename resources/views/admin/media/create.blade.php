@extends('layouts.admin1')

@section('styles')

    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
    
@stop

@section('content')

    <h1>Upload media</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'dropzone']) !!}
        
    {!! Form::close() !!}

@stop


@section('scripts')
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

@stop