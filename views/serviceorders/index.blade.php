@section('container')
<div align="center" >




 <br>





<table  cellspacing="10">
<tr>
<th>
	{{ Html::link('serviceorders?page='.$page.'&order=asc&sort=user_id', '&uarr;')}}
	{{ Html::link('serviceorders?page='.$page.'&order=desc&sort=user_id', '&darr;')}}<br><br>

	Användare

</th>

<th>
	{{ Html::link('serviceorders?page='.$page.'&order=asc&sort=service_id', '&uarr;')}}
	{{ Html::link('serviceorders?page='.$page.'&order=desc&sort=service_id', '&darr;')}}<br><br>

	Service

</th>
<th>

	{{ Html::link('serviceorders?page='.$page.'&order=asc&sort=created_at', '&uarr;')}}
	{{ Html::link('serviceorders?page='.$page.'&order=desc&sort=created_at', '&darr;')}}<br><br>
	
	Skapad
</th>

<th>

	{{ Html::link('serviceorders?page='.$page.'&order=asc&sort=id', '&uarr;')}}
	{{ Html::link('serviceorders?page='.$page.'&order=desc&sort=id', '&darr;')}}<br><br>
	
	Gå till

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

{{$serviceorder->created_at;}}

</td>

<td>


 {{ Html::link('/serviceorders/'.$serviceorder->id, 'Gå till', array('class'=>'Buttons'))}}

 </td>
<td>



</td>
</tr>
@endforeach
</table> 

{{ $serviceorders->appends(array('sort' => $sort, 'order'=>$order))->links() }}
</div>
@stop