
@section('container')
<br>


      
 <div class="eBlock">

 <div class="etitle">
  Våra Tjänster
 </div>
 
<div class="ebody">
	@foreach($services as $service)
		

		 <li>{{ Html::link('services/'.$service->id,  $service->name )}}</li>

		@endforeach
		</div></div><br>


 

@stop


