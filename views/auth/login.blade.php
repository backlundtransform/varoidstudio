
@section('container')
<br><br><br><br><br>
<div align="center">
    {{ Form::open(['method' => 'post', 'route' => 'postlogin']) }}
    <!-- check for login errors flash var -->
    @if (Session::has('login_errors'))
    <span class="error">Username or password incorrect.</span><br>
    @endif
    <!-- username field -->
    {{ Form::label('username', 'Username') }}{{ Form::text('username') }}<br>
    <!-- password field -->
    {{ Form::label('password', 'Password') }}{{ Form::password('password') }}<br>
    <!-- submit button -->
    {{ Form::submit('Login') }}
    {{ Form::close() }}
</div><br><br><br><br><br>
@stop