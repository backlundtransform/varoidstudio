    @section('container')
<div id="check">

 {{ Form::open(['method' => 'put', 'route' =>['updatepivot',  $users->id ]]) }} 





  @foreach($products as $key => $product)


  <table>
<tr>
<td> {{Form::checkbox($key, $product->pivot->id, null, array('id'=> $product->price, 'class'=>  'check' ))}}</td>
<td> {{$product->name}}   {{$product->price}} kr/mån   </td>
<td> {{ Form::select('time'.$key, array('1' => '1 Månader', '3' => '3 Månader', '12' => '12 Månader'), null, array('class'=> 'select'




  ));}}




</td>
</tr>
<tr>

  </table>
  
   <br>
  @endforeach
</table> 
  <hr>


<b>Total:</b><span id='total'>0</span><br>
{{Form::submit('Uppdatera Beställning')}}
    {{Form::close()}}
  </div>





  @stop

