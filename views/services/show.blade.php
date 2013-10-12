@section('container')

 
 <div class="eBlock">

 <div class="etitle">
   {{ $services->name }}

 </div>
 
<div class="ebody"><br>
	{{ Html::image($services->image) }}

		<br>{{ $services->description }}


		<br><br>Fyll i formuläret så kontaktar vi dig:


		{{ Form::open(['method' => 'put', 'route' =>['savepivot', $services->id]]) }}
			{{ Form::hidden('id', $services->id) }}





  <hr>





<table>
<tr> @if (Auth::guest())
<td> {{Form::label('username' , 'Användarnamn:')}} </td>
<td> *{{Form::text('username')}} </td>
</tr>
<tr>
<td> {{Form::label('password' , 'Lösenord:')}}</td>
<td> *{{Form::password('password')}}</td>
</tr>
<tr>
<td> {{Form::label('password_confirmation' , 'Bekräfta Lösenord:')}}</td>
<td> *{{Form::password('password_confirmation')}}</td>
</tr>
<tr>
<td> {{Form::label('fornamn' , 'Förnamn:')}} </td>
<td>*{{Form::text('fornamn')}}</td>
</tr>
<tr>
<td> {{Form::label('efternamn' , 'Efternamn:')}}  </td>
<td>*{{Form::text('efternamn')}}</td>
</tr>
<tr>
<td>{{Form::label('telefon' , 'Telefonnummer:')}}  </td>
<td>*{{Form::text('telefon')}}</td>
</tr>
<tr>
<td>  {{Form::label('email' , 'Email:')}}  </td>
<td> *{{Form::text('email')}}</td>
</tr>@endif

<tr>
<td>  {{Form::label('suggested_price' , 'Prisförslag (frivilligt):')}}  </td>
<td> &nbsp;&nbsp;{{Form::text('suggested_price')}} kr</td>
</tr>

<tr>
<td>  {{Form::label('message' , 'Meddelande:')}} </td>
<td> </td>
</tr>
</table>

  {{Form::textarea('message')}}


   
     
  <br>
   
  <br>
	
  	 


 {{Form::submit('Skicka')}}
    {{Form::close()}}
    
  <br>
   



	 <br><br>  

			
<br><br></div></div><br>

<br>


@if(isset(Auth::user()->id))
		
		@if (User::find(Auth::user()->id)->roles == 'Admin')

			{{ Html::link('services/'.$services->id.'/edit', 'Redigera', array('class'=>'Buttons'))}} 
			 {{ Form::open(['method' => 'delete', 'route' =>['services.destroy',  $services->id]]) }}
			{{ Form::hidden('id', $services->id) }}
			{{ Form::submit('Ta Bort') }}
				{{ Form::close() }}
			
		@endif
	@endif
	<br><br>
				@stop