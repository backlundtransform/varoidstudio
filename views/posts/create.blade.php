@section('container')

 {{ Form::open(['method' => 'post', 'route' =>'posts.store']) }}

   
   
      {{Form::label('title' , 'Title:')}} <br>
   {{Form::text('title')}} <br>
   {{Form::label('body' , 'Message:')}} <br>
   {{Form::textarea('body')}}<br>
   {{Form::submit('Lägg till')}} <br>
    {{Form::close()}}
@stop