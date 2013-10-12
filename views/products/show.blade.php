@section('container')

 
 <div class="eBlock">

 <div class="etitle">
   {{ $products->name }}

 </div>
 
<div class="ebody"><br>
	{{ Html::image($products->image) }}

		<br>{{ $products->description }}


		<br><br>



	 <br><br>  {{ Html::link('/products', 'Beställ Produkt', array('class'=>'Buttons'))}}

			
<br><br>



    




<br></div></div><br>


@if(isset(Auth::user()->id))
		
		@if (User::find(Auth::user()->id)->roles == 'Admin')

			{{ Html::link('products/'.$products->id.'/edit', 'Redigera', array('class'=>'Buttons'))}} 
			 {{ Form::open(['method' => 'delete', 'route' =>['products.destroy',  $products->id]]) }}
			{{ Form::hidden('id', $products->id) }}
			{{ Form::submit('Ta Bort') }}
				{{ Form::close() }}
			
		@endif
	@endif
	<br><br>
				@stop
    