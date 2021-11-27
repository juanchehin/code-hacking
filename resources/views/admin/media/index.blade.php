@extends('layouts.admin1')


@section('content')

<h1>Media</h1>

    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<form action="delete/media" method="POST" class="form-inline">

  {{crsf_field()}}

  {{method_field('delete')}}

  <div class="form-group">
    <select name="checkBoxArray" id="" class="form-control">
      <option value="delete">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <input  type="submit" name="delete_all" class="btn-primary">
  </div>

<table class="table">
    <thead>
      <tr >
        <th scope="col"><input type="checkbos" id="options"></th>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Created</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if($photos)

      @foreach($photos as $photo => $attribute)

      <tr>
        <td><input class="ckeckbox" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td> 
        <th>{{ $attribute->id}}</th>
        <td><img height="50" src="{{ $attribute->file}}" alt=""></td>
        <td>{{ $attribute->created_at ? $attribute->created_at : 'no date'}}</td>
        <td>
          <input type="hidden" name="photo" value="{{$photo->id}}">
        </td>
      </tr>

      @endforeach

     
    </tbody>
  </table>

</form> 
@endif

@stop

@section('scripts')

<script>

  $(document).ready(function(){

    $('#options').click(function(
      if(this.checked){
        $('.checkBoxes').each(function(){
          this.checked = true;
        });
      }else{
        $('.checkBoxes').each(function(){
          this.checked = false;
        });
      }
    ))
  });

</script>

@stop