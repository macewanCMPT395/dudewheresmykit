<html>
<body>
<div id="header">
Log In
</div>
<div id="form">
{{ Form::open(['route' => 'sessions.store']) }}

<div>
{{ Form::label('email', 'Email: ') }}
{{ Form::email('email') }}
</div>
<div>
{{ Form::label('password', 'Password: ') }}
{{ Form::password('password')}}
</div>

 <div> {{ Form::submit('Log In') }}</div> 

  {{ Form::close()}}

</div>
</body>
</html>
