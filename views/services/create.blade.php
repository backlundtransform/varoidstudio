@section('container')

 {{ Form::open(['route' =>'services.store',  'enctype'=>'multipart/form-data']) }}

   
   
      {{Form::label('name' , 'Namn:')}} <br>
   {{Form::text('name')}} <br>
   {{Form::label('description' , 'Beskrivning:')}} <br>
   {{Form::textarea('description')}}<br>
   {{Form::label('image' , 'Ladda upp bild:')}} <br>
    {{Form::file('image')}}<br>
   {{Form::submit('Lägg till')}} <br>
    {{Form::close()}}
@stop