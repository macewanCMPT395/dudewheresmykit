<!DOCTYPE html>
<html>
	<head>
		<title>KIT-MTS | Login</title>
		<meta charset="UTF-8">
		{{ HTML::style("css/master.css") }}
	</head>
	<body> 
		<div id="container" style="width:400px; margin-top:300px; font-size:22px;">
			<div id="content">
			{{ HTML::image('img/logo.png') }}
					<h1>KIT-MTS Login</h1>
					@if(Session::has('badlogin'))
						<p style="font-weight:bold;">Invalid username and/or password.</p>
					@endif
				{{ Form::open(array('post' => 'login'))}}
					<div>
						{{ Form::label('email', 'Email') }}
						{{ Form::text('email') }}
					</div><div>
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password') }}
					</div><div>
						{{ Form::submit ('Log In!') }}
					</div>
				{{Form::close()}}
			</div>
		</div>
	</body>
</html>
