@section('container')
<div align="center" >




 <br>





<table  cellspacing="10">
<tr>
<th>
	{{ Html::link('deadline?page='.$page.'&order=asc&sort=user_id', '&uarr;')}}
	{{ Html::link('deadline?page='.$page.'&order=desc&sort=user_id', '&darr;')}}<br><br>

	Användare

</th>

<th>
	{{ Html::link('deadline?page='.$page.'&order=asc&sort=service_id', '&uarr;')}}
	{{ Html::link('deadline?page='.$page.'&order=desc&sort=service_id', '&darr;')}}<br><br>

	Service

</th>

<th>

	{{ Html::link('serviceorders?page='.$page.'&order=asc&sort=our_modificated_price', '&uarr;')}}
	{{ Html::link('serviceorders?page='.$page.'&order=desc&sort=our_modificated_price', '&darr;')}}<br><br>
	
	Pris
</th>
<th>

	{{ Html::link('deadline?page='.$page.'&order=asc&sort=deadline', '&uarr;')}}
	{{ Html::link('deadline?page='.$page.'&order=desc&sort=deadline', '&darr;')}}<br><br>
	Deadline
	
</th>
<th>

	{{ Html::link('deadline?page='.$page.'&order=asc&sort=date_started', '&uarr;')}}
	{{ Html::link('deadline?page='.$page.'&order=desc&sort=date_started', '&darr;')}}<br><br>
	
	 Påbörjat
</th>
<th>

	{{ Html::link('deadline?page='.$page.'&order=asc&sort=date_paid', '&uarr;')}}
	{{ Html::link('deadline?page='.$page.'&order=desc&sort=date_paid', '&darr;')}}<br><br>
	
	Betalat
</th>
<th>

	{{ Html::link('deadline?page='.$page.'&order=asc&sort=paid_deadline', '&uarr;')}}
	{{ Html::link('deadline?page='.$page.'&order=desc&sort=paid_deadline', '&darr;')}}<br><br>
	
	förfallodag
</th>
<th>


</th>


</tr>
@foreach($serviceorders as $serviceorder)
<tr>
<td>

{{User::find($serviceorder->user_id)->username;}}

</td>
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

{{$serviceorder->date_started;}}

</td>
<td>

{{$serviceorder->date_paid;}}

</td>

<td>

{{$serviceorder->date_paid;}}

</td>
<td>


 {{ Html::link('/serviceorders/'.$serviceorder->id.'/edit', 'Redigera', array('class'=>'Buttons'))}}

 </td>
<td>



</td>
</tr>
@endforeach
</table> 

{{ $serviceorders->appends(array('sort' => $sort, 'order'=>$order))->links() }}
</div>
@stop