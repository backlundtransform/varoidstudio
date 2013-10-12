@section('container')
<div class="page">
 {{ Form::open(['route' =>'users.store']) }}





<div id="check">


  @foreach($products as $key => $product)


  <table>
<tr>
<td> {{Form::checkbox($key , $product->id, null, array('id'=> $product->price, 'class'=>  'check' ))}}</td>
<td> {{$product->name}}   {{$product->price}} kr/mån   </td>
<td> {{ Form::select('time'.$key, array('1' => '1 Månader', '3' => '3 Månader', '12' => '12 Månader'), null, array('class'=> 'select'




  ));}}




</td>
</tr>
<tr>

  </table>
  
   <br>
  @endforeach
  <hr>


<b>Total:</b><span id='total'>0</span>
</div>
 @if (Auth::guest())
<table>
<tr>
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
</tr>
</table>
@endif

   
     
  <br>
   
  <br>
	
  	 


 {{Form::submit('Slutför Beställning')}}
    {{Form::close()}}
    
  <br>
   
  

</div>

@stop