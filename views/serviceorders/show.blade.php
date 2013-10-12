@section('container')


<table>
 
  <tr>
    <td> <b>Användarnamn: {{$user->username}} <br>
           
            Förnamn: {{$user->fornamn}} <br>
            Efternamn: {{$user->efternamn}} <br>
            Telefon: {{$user->telefon }} <br>
            Email: {{$user->email}} <br>

		Prisförslag: {{$serviceorder->suggested_price}} <br> 
       Meddelande:  </b>
 </tr>
  
</table>
    	
    <div class=message>		{{$serviceorder->message}} </div>

   
<p>{{ Html::link('serviceorders/'.$serviceorder->id.'/edit', 'Redigera', array('class'=> 'Buttons'))}} </p>
<p>{{ Html::link('serviceorders', 'Tillbaka')}}</p> <br>

@stop