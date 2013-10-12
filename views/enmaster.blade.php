<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
<title>{{$title}}</title>

{{Html::style('css/layout.css');}}

{{Html::script('js/jquery.js');}}
{{Html::script('js/lightbox.js');}}
{{Html::script('js/ckeditor/ckeditor.js');}}
{{Html::script('js/jquery.nivo.slider.js');}}
{{Html::script('js/javascript.js');}}
{{Html::script('js/jqueryui.js');}}

{{Html::style('css/ui.css');}}
{{Html::style('css/bar.css');}}
{{Html::style('css/nivo-slider.css');}}
{{Html::style('css/lightbox.css');}}



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
            <a href="https://plus.google.com/u/0/b/104893555527705795495/104893555527705795495/posts" target="_blank"><div class="google-hover social-slide"></div></a>
 <a href="http://www.facebook.com/pages/Varoid/605764756125145" target="_blank"><div class="facebook-hover social-slide"></div></a>
 <a href="https://twitter.com/Varoidstudio" target="_blank"><div class="twitter-hover social-slide"></div></a>
       <hgroup>
                <h1>{{ Html::image('/img/logo.png')}}</h1>

            </hgroup>

        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
          
    {{ Html::image('/img/planetapp.jpg')}}
  
                
            </div>
           
        

    </div></header>
<nav>
<ul id="menu-bar">
 <li class="active">{{ Html::link('posts/', 'Home')}}</li>

 <li>{{ Html::link('portfolios/', 'Portfolio')}}
  

  <ul>
  @foreach(Portfolio::All() as $portfolio)
  <li>{{ Html::link('portfolios/'.$portfolio->id, $portfolio->name)}}</li>
    @endforeach
  </ul>
 </li>
  <li>{{ Html::link('about/', 'About us')}}</li>
 <li>{{ Html::link('planets/', 'API')}}</li>
  


 <li>{{ Html::link('/varoidforum', 'Forum')}}</li>

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
      
     <div  style="float:right; padding:20px;">Contact<hr> +46 (0)708378703<br>
     <a href="mailto:support@varoid.se">
 support@varoid.se</a> <br>
<br>© 2013

        </footer>

</div>

</body>



</html>