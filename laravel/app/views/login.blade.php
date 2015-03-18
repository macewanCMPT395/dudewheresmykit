@extends ('master')
@section ('content')
<div id="form">
    {{ Form::open(array('post' => 'login'))}}
		<div>
		    {{ Form::label('email', 'Email') }}
		    {{ Form::text('email') }}
		</div><div>
		    {{ Form::label('name', 'Name') }}
		    {{ Form::password('password') }}
		</div><div>
			{{ Form::submit ('Log In!') }}
		</div>
	{{Form::close()}}
</div>
@stop