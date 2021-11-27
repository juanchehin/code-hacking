@extends('layouts.admin1')

@section('content')

@include('includes.tinyeditor')

    <h1>Edit Post</h1>

    <div class="row">

        <div class="col-sm-6">
            <img height="450" src="{{$post->photo->file}}" alt="" class="img-responsive">
        </div>

                <div class="col-sm-6">
        
                {!! Form::model(['method'=>'PATCH','action'=> ['AdminPostsController@update' , $post->id ] , 'files'=>true]) !!}

                <div class="form-group">
                    
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null,['class'=>'form-control']) !!}
                    
                </div>
                
                <div class="form-group">
                    
                    {!! Form::label('category_id', 'Category : ') !!}
                    {!! Form::select('category_id', $categories ,null,['class'=>'form-control']) !!}
                    
                </div>
                
                <div class="form-group">
                    
                    {!! Form::label('photo_id', 'Photo : ') !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                    
                </div>

                <div class="form-group">
                    
                    {!! Form::label('body', 'Description :') !!}
                    {!! Form::textarea('body', null ,['class'=>'form-control']) !!}
                    
                </div>

                {{--  BOTON PARA ENVIAR  --}}
                <div class="form-group">
                    
                    {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
                    
                </div>

                
                {!! Form::close() !!}

                {{--  BOTON PARA eliminar  --}}
                {!! Form::open(['method'=>'DELETE','action'=> ['AdminPostsController@destroy' , $post->id ] ]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    <div class="row">
        {{--  Cartel de errores  --}}
        @include('includes.form_error')
    </div>


    <div id="disqus_thread"></div>
    <script>
    
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://https-juanchehin-github-io-cr.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
           
    <script id="dsq-count-scr" src="//localhost:8000.disqus.com/count.js" async></script>


@stop