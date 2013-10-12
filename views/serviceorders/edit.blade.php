@section('container')

<div align="center">
 {{ Form::open(['method' => 'put', 'route' =>['serviceorders.update',  $serviceorder->id ]]) }}
   
 
      {{Form::label('our_modificated_price' , 'Vårat Pris')}} <br>
   {{Form::text('our_modificated_price', $serviceorder->our_modificated_price)}} <br>
   {{Form::label('deadline', 'Deadline:')}} <br>
   {{Form::text('deadline', $serviceorder->deadline, array('class'=>'datepicker'))}}<br>
   {{Form::label('date_started' , 'Påbörjat:')}} <br>
     {{Form::text('date_started', $serviceorder->date_started, array('class'=>'datepicker'))}}<br>
      {{Form::label('date_paid' , 'Betalat:')}} <br>
      {{Form::text('date_paid', $serviceorder->date_paid, array('class'=>'datepicker'))}}<br>

      {{Form::label('date_paid', 'Ska betalats senast:')}} <br>
       {{Form::text('paid_deadline', $serviceorder->paid_deadline, array('class'=>'datepicker'))}}<br>
   {{Form::submit('Redigera')}} <br>
    {{Form::close()}}

</div>
@stop


