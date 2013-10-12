
@section('container')
<br>


   
 
   <ul>

@foreach($posts as $post)
      
 <div class="eBlock">

 <div class="etitle">
   {{ Html::link('posts/'.$post->id, $post->title)}}

 </div>
 
<div class="ebody">
	
		{{ $post->body }}
		</div></div><br>
@endforeach

  </ul>
{{ $posts->links() }}
@stop


