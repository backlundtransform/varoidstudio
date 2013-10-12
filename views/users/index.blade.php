
@section('container')
<div align="center">




 <br>





<table  cellspacing="10">
<tr>
<th>
 
	
	{{ Html::link('users?page='.$page.'&order=asc&sort=username', '&uarr;')}}
	{{ Html::link('users?page='.$page.'&order=desc&sort=username', '&darr;')}}


</a>
</th>
<th>

	{{ Html::link('users?page='.$page.'&order=asc&sort=created_at', '&uarr;')}}
	{{ Html::link('users?page='.$page.'&order=desc&sort=created_at', '&darr;')}}

</th>
<th></th>
</tr>
@foreach($users as $user)
<tr>
<td>{{ Html::link('users/'.$user->id, $user->username)}} </td>
<td>{{ $user->created_at }} </td>
<td>{{ Html::link('users/'.$user->id.'/edit', 'Redigera')}}</td>
</tr>
@endforeach
</table> 

{{ $users->appends(array('sort' => $sort, 'order'=>$order))->links() }}
</div>
@stop