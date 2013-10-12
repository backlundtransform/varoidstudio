
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
<title>{{$title}}</title>

{{Html::style('css/layout.css');}}

{{Html::script('js/jquery.js');}}


{{Html::script('js/jquery.nivo.slider.js');}}
{{Html::script('js/javascript.js');}}
{{Html::script('js/jqueryui.js');}}
{{Html::style('css/ui.css');}}
{{Html::style('css/bar.css');}}
{{Html::style('css/nivo-slider.css');}}



</head>

<body>
 



 @if(Auth::check())
  <div id="userbar"><ul>
   <li> 
 Välkommen {{Html::link('users/'.Auth::user()->id, Auth::user()->username)}} </li>

@if(Auth::user()->role='admin')
   <li>  Administrera   
  <ul>
     
    <li>{{Html::link('users', 'Användare')}}</li>
    <li>{{Html::link('productorders', 'Produkt Beställningar')}}</li>
       <li>{{Html::link('productorders/notpaid', 'Obetalda Produkter')}}</li>
         <li>{{Html::link('serviceorders', 'Nya Tjänstförfrågningar')}}</li>
          <li>{{Html::link('deadline', 'Påbörjade Tjänster')}}</li>
     </ul>
     <li>  Lägg till   
  <ul>

     <li> {{ Html::link('posts/create', 'Blog')}}</li>
      <li>{{Html::link('services/create', 'Tjänst')}}</li>
       <li>{{Html::link('products/create', 'Produkt')}}</li>
       <li>{{Html::link('portfolios/create', 'Portfolio')}}</li>
   </li>



   @endif
 </ul></div><br>
 @endif


 <br> <div id="maincontainer">
  <header>
            
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="">Choose language</option>
    <option value="/en">English</option>
    <option value="/se">Swedish</option>
 
</select>
       <hgroup>
                <h1>{{ Html::image('/img/logo.png')}}</h1>

            </hgroup>

        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
          
    {{ Html::image('/img/planetapp.jpg')}}
    {{ Html::image('/img/walle.jpg')}}
    {{ Html::image('/img/nemo.jpg')}}
                
            </div>
           
        

    </div></header>
<nav>
<ul id="menu-bar">
 <li class="active">{{ Html::link('posts/', 'Hem')}}</li>
 <li>{{ Html::link('services/', 'Tjänster')}}


<ul>

 
  @foreach(Serv::All() as $service)
  <li>{{ Html::link('services/'.$service->id, $service->name)}}</li>
    @endforeach
  </ul>
 </li>
  
 <li>{{ Html::link('products/', 'Produkter')}}
<ul>

 
  @foreach(Product::All() as $product)
  <li>{{ Html::link('products/'.$product->id, $product->name)}}</li>
    @endforeach
  </ul>
 </li>

 <li>{{ Html::link('portfolios/', 'Portfolio')}}
  <ul>
  @foreach(Portfolio::All() as $portfolio)
  <li>{{ Html::link('portfolios/'.$portfolio->id, $portfolio->name)}}</li>
    @endforeach
  </ul>
 </li>
   @if(Auth::guest())
 <li><a href="#">Om oss</a></li>
 @endif
 <li>{{ Html::link('http://goranb.itlyftetweb.se/CakeCommunity/Threads', 'Support Forum')}}</li>

 @if(Auth::check())
 <li>{{Html::link('users/'.Auth::user()->id, 'Min Sida')}}</li>
<li>{{Html::link('logout', 'Logga ut')}}</li>
@else
<li>{{Html::link('login', 'Login')}}</li>
@endif
</ul>

  </nav>      

<aside>
            
                    
            </aside>

            <section>
   @if( $errors->count() > 0 )
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('username', '<li>:message</li>') }}
        {{ $errors->first('password', '<li>:message</li>') }}
        {{ $errors->first('password_confirmation', '<li>:message</li>') }}
        {{ $errors->first('fornamn', '<li>:message</li>') }}
        {{ $errors->first('telefon', '<li>:message</li>') }}
        {{ $errors->first('email', '<li>:message</li>') }}
    </ul>   
@endif
<div class ='innertube'>
@yield('container')
</div>
</section>
<br><br>


<footer>
       <div style="float:left; padding:20px;">Adress<hr> Verkstadsgatan 18M
<br>35246 Växjö</div> 
      
     <div  style="float:right; padding:20px;">Kontakt<hr>  Växel: +46 (0)70 - 66 66 66<br>
       sales@webappar.se<br>
info@webappar.se<br>© 2013

        </footer>

</div>

</body>



</html>