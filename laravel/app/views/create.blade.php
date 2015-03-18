<html>
<body>
<div id="header">
Log In
</div>
<div id="form">
{{ Form::open() }}

<div>
{{ Form::label('Email', 'Email: ') }}
{{ Form::email('Email') }}
</div>
<div>
{{ Form::label('Password', 'Password: ') }}
{{ Form::password('Password')}}
</div>

 <div> {{ Form::submit('Log In') }}</div> 

  {{ Form::close()}}

</div>
</body>
</html>
