 

@section('container')

 
 <div class="eBlock">

 <div class="etitle">
   {{ $posts->title}}

 </div>
 
<div class="ebody">
		{{ $posts->body }}
		</div></div><br>
    
    
    {{ Html::link('posts', 'Tillbaka')}} <br>

    @if(isset(Auth::user()->id))
		
		@if (User::find(Auth::user()->id)->roles == 'Admin')

			{{ Html::link('posts/'.$posts->id.'/edit', 'Redigera', array('class'=>'Buttons'))}}

			 {{ Form::open(['method' => 'delete', 'route' =>['posts.destroy',  $posts->id]]) }}
			{{ Form::hidden('id', $posts->id) }}
			{{ Form::submit('Ta Bort') }}
				{{ Form::close() }}
			
		@endif
	@endif

 
@stop