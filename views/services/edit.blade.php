@section('container')

 {{ Form::model($service, ['method' => 'put', 'route' =>['services.update',  $service->id ], 'enctype'=>'multipart/form-data']) }}

   
   
      {{Form::label('name' , 'Namn:')}} <br>
   {{Form::text('name')}} <br>
   {{Form::label('description' , 'Beskrivning:')}} <br>
   {{Form::textarea('description')}}<br>
   {{Form::label('image' , 'Ladda upp bild:')}} <br>
    {{Form::file('image')}}<br>
   {{Form::submit('Redigera')}} <br>
    {{Form::close()}}
@stop