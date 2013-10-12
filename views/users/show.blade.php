    @section('container')
@if(isset($message))
  <div class="message">
 @foreach($message as $key=> $messages)
 {{$messages}}  : {{ Html::link('users/'.$user->id.'/editproduct', 'Förläng Produkt>>')}}<br>
@endforeach
</div>
  @endif
  <div style="float:left"><div id="datepicker"></div></div>
  <div style="float:right">
   <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Användar Profil</a></li>
    <li><a href="#tabs-2">Produkter</a></li>
    <li><a href="#tabs-3">Tjänster</a></li>
  </ul>
  <div id="tabs-1">
   			
            {{$user->username }}<br><br>
            {{$user->fornamn  }}<br><br>
            {{$user->efternamn }}<br><br>
            {{ $user->telefon  }}<br><br>
            {{$user->email   }}<br><br>{{ Html::link('users/'.$user->id.'/edit', 'Redigera Uppgifter', array('class'=>'Buttons'))}}

  </div>
  <div id="tabs-2">

     {{ Html::link('users/'.$user->id.'/editproduct', 'Förläng Produkter?', array('class'=>'Buttons'))}}<br>
 <table  cellspacing="5">
<tr>
<th>
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=tjanst_id#tabs-2', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=tjanst_id#tabs-2', '&darr;')}}<br><br>

  Produkt

</th>
<th>

  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=period#tabs-2', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=period#tabs-2', '&darr;')}}<br><br>
  
  Beställt till

</th>

<th>

  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=paid_to#tabs-2', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=paid_to#tabs-2', '&darr;')}}<br><br>
  
  Betalat till



  
<th>

  
{{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=activated#tabs-2', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=activated#tabs-2', '&darr;')}}<br><br>
  Aktiverad
</th>
</tr>
 @foreach($pivots as $key=> $pivot)
<tr>
<td>{{ Product::find($pivot->tjanst_id)->name }}</td>
<td>{{ $pivot->period }}
</td>
<td>{{ $pivot->paid_to }}</td>
<td>@if($pivot->activated)
 Aktiverad

@else 
Inväntar Betalning

@endif
</td>

   @endforeach


  
</table> 
 {{ $pivots->appends(array('sort' => $sort, 'order'=>$order))->links() }}
  </div>
  <div id="tabs-3">

<table  cellspacing="5">
<tr>


<th>
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=service_id', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=service_id', '&darr;')}}<br><br>

  Service

</th>

<th>

  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=our_modificated_price', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=our_modificated_price', '&darr;')}}<br><br>
  
  Pris
</th>
<th>

  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=deadline', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=deadline', '&darr;')}}<br><br>
  Deadline
  
</th>

<th>

  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=date_paid', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=date_paid', '&darr;')}}<br><br>
  
  Betalat
</th>
<th>

  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=asc&sort=paid_deadline', '&uarr;')}}
  {{ Html::link('users/'.$user->id.'?page='.$page.'&order=desc&sort=paid_deadline', '&darr;')}}<br><br>
  
  förfallodag
</th>




</tr>
@foreach($serviceorders as $serviceorder)
  @if ($serviceorder->date_started != '0000-00-00')
<tr>

<td>

{{Serv::find($serviceorder->service_id)->name;}}

</td>

<td>

{{$serviceorder->our_modificated_price;}}

</td>


<td>

{{$serviceorder->deadline;}}

</td>

<td>

{{$serviceorder->date_paid;}}

</td>

<td>

{{$serviceorder->date_paid;}}

</td>

</tr>
@endif
@endforeach

</table> 

{{ $serviceorders->appends(array('sort' => $sort, 'order'=>$order))->links() }}

</div>

  </div>



	@stop

