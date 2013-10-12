@section('container')


 {{ Form::model($posts, ['method' => 'put', 'route' =>['posts.update',  $posts->id ]]) }}
   
 
      {{Form::label('title' , 'Title:')}} <br>
   {{Form::text('title')}} <br>
   {{Form::label('body' , 'Message:')}} <br>
   {{Form::textarea('body')}}<br>
   {{Form::submit('Redigera')}} <br>
    {{Form::close()}}
@stop