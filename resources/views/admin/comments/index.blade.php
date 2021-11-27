@extends('layouts.admin1')

@section('content')

    <h1>Comments</h1>

    @if(count($comments) > 0)

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Body</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        @foreach($comments as $comment)
   
    
          <tr> 
            <td>{{ $comment->id}}</td>
            <td>{{ $comment->author}}</td>
            <td>{{ $comment->email}}</td>
            <td>{{ $comment->body}}</td>
            <td><a href="{{route('post', ['id' => 1]  )}}">View Post</a></td>
            {{--  ===========================  --}}
            {{--  Boton de aprobar/no aprobar  --}}
            {{--  ===========================  --}}
            <td>
              @if($comment->is_active === 1)
              
                    {!! Form::open(['method'=>'PATCH','action'=> ['PostsCommentController@update', $comment->id ] ]) !!}

                    <input type="hidden" name="is_active" value="0">
            
                    <div class="form-group">
                        {!! Form::submit('Un-approve', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
              @else

                  {!! Form::open(['method'=>'PATCH','action'=> ['PostsCommentController@update', $comment->id ] ]) !!}

                    <input type="hidden" name="is_active" value="1">
            
                    <div class="form-group">
                        {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                    </div>
                    
                    {!! Form::close() !!}

              @endif
            
            {{--  ===========================  --}}
            {{--  Boton de eliminar            --}}
            {{--  ===========================  --}}
            </td>
            <td>
                {!! Form::open(['method'=>'DELETE','action'=> ['PostsCommentController@destroy', $comment->id ] ]) !!}
        
                <div class="form-group">
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </div>
                
                {!! Form::close() !!}
              </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      @else

      <h1 class="text-content">No Comments </h1>

      @endif


@stop