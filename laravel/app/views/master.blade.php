<!DOCTYPE html>
<html>
	<head>
		@if(isset($title))
			<title>KIT-MTS | {{{ $title }}}</title>
		@else
			<title>KIT-MTS</title>
		@endif
		<meta charset="UTF-8">
		{{ HTML::style("css/master.css") }}
	</head>
	<body>
		<div id ="user">
			@if(Auth::check())
				Welcome back, {{{ Auth::user()->getName() }}} | <a href="/logout">Logout</a>
			@else
				You are not logged in.
			@endif
		</div>

		<div id="container">
			<div id="banner">
				<a href="/"><span id="logo">
					KIT-MTS
				</span></a>
				<ul id="menu">
					<a href="{{ url("/booking") }}" id="menuItem1" ><li>Book a kit</li></a>
					<a href="{{ url("/kits") }}" id="menuItem2" ><li>View kits</li></a>
					<a href="#" id="menuItem3" ><li>Summary</li></a>
					<a href="#" id="menuItem4" ><li>Help</li></a>
					<a href="#" id="menuItem5" ><li>Account</li></a>
				</ul>
			</div>
			<br style="clear:both;">

			@if(Session::has('errors'))
				<div id="error">
					<ul>
					@foreach(Session::get("errors") as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			@if(Session::has('message'))
				<div id="message">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
			@if(isset($single))
				<div id="single">
					<div id="content">	
					<h1>
						@if(isset($title))
							{{{ $title }}}
						@else
							Default
						@endif
					</h1>

						@yield('content')
					</div>
				</div>
			@else
				<div id="side">
					<h1>Summary</h1>
					@yield ('sidebar')
				</div>

				<div id="main">
					<h1>
						@if(isset($title))
							{{{ $title }}}
						@else
							Default
						@endif
					</h1>
					<div id="content">
						@yield('content')
					</div>
				</div>
				<br style="clear:both;">
			@endif
		</div>
	</body>
</html>
