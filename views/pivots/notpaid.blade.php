@section('container')
<div align="center">




 <br>





<table  cellspacing="10">
<tr>
<th>
	{{ Html::link('productorders/notpaid?page='.$page.'&order=asc&sort=user_id', '&uarr;')}}
	{{ Html::link('productorders/notpaid?page='.$page.'&order=desc&sort=user_id', '&darr;')}}<br><br>

	Användare

</th>

<th>
	{{ Html::link('productorders/notpaid?page='.$page.'&order=asc&sort=tjanst_id', '&uarr;')}}
	{{ Html::link('productorders/notpaid?page='.$page.'&order=desc&sort=tjanst_id', '&darr;')}}<br><br>

	Produkt

</th>
<th>

	{{ Html::link('productorders/notpaid?page='.$page.'&order=asc&sort=period', '&uarr;')}}
	{{ Html::link('productorders/notpaid?page='.$page.'&order=desc&sort=period', '&darr;')}}<br><br>
	
	Beställt till

</th>

<th>

	{{ Html::link('productorders/notpaid?page='.$page.'&order=asc&sort=paid_to', '&uarr;')}}
	{{ Html::link('productorders/notpaid?page='.$page.'&order=desc&sort=paid_to', '&darr;')}}<br><br>
	
	Betalat till

</th>
<th>{{ Html::link('productorders/notpaid?page='.$page.'&order=asc&sort=created_at', '&uarr;')}}
	{{ Html::link('productorders/notpaid?page='.$page.'&order=desc&sort=created_at', '&darr;')}}

<br><br>Skapad</th>

	
<th>

	
{{ Html::link('productorders/notpaid?page='.$page.'&order=asc&sort=activated', '&uarr;')}}
	{{ Html::link('productorders/notpaid?page='.$page.'&order=desc&sort=activated', '&darr;')}}<br><br>
	Aktivera
</th>
<th></th>
</tr>
@foreach($productorders as $productorder)
<tr>
<td>

{{ Html::link('users/'.$productorder->user_id, User::find($productorder->user_id)->username)}}


</td>
<td>

{{Product::find($productorder->tjanst_id)->name;}}

</td>

<td>

{{$productorder->period;}}

</td>
<td>

{{$productorder->paid_to;}}

</td>

<td>

{{$productorder->created_at;}}

</td>

<td>


 {{ Form::open(['method' => 'put', 'route' =>['productorders.update', $productorder->id]]) }}
			{{ Form::hidden('id', $productorder->id) }}
			
@if(!$productorder->activated)
			{{ Form::submit(' Aktivera  &nbsp;') }}
			

				@else
					{{ Form::submit('Avaktivera') }}
		@endif

			{{ Form::close() }}

 </td>
<td>


{{ Form::open(['method' => 'delete', 'route' =>['productorders.destroy', $productorder->id]]) }}
			{{ Form::hidden('id', $productorder->id) }}
			

			

			
					{{ Form::submit('Tabort') }}

			{{ Form::close() }}

</td>
</tr>
@endforeach
</table> 

{{ $productorders->appends(array('sort' => $sort, 'order'=>$order))->links() }}
</div>
@stop