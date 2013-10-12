@section('container')


  <div style="float:left"><div id="datepicker"></div></div>
  <div style="float:right">
   <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Redigera Profil</a></li>
 
  </ul>
  <div id="tabs-1">
   			
      {{ Form::model($users, ['method' => 'put', 'route' =>['users.update',  $users->id ]]) }}  
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
   {{Form::submit('Redigera')}} <br>
    {{Form::close()}}

  </div>
  


 
@stop