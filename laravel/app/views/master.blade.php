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
		
		<div id="container">
			<div id="banner">
				<a href="http://epl.ca">
					{{ HTML::image('img/logo.png', "Logo",  array("style" => "width:150px; height:45px; margin-left:10px; float:left;")) }}
				</a>
				<ul id="menu">
					<a href="{{ url("/") }}" id="menuItem1" ><li>Home</li></a><a href="{{ url("/booking") }}" id="menuItem2" ><li>Book a Kit</li></a><a href="{{ url("/kits") }}" id="menuItem3" ><li>View Kits</li></a><a href="{{ url("/summary") }}" id="menuItem4" ><li>Bookings</li></a><a href="{{ url("/transfers") }}" id="menuItem5" ><li>Transfer</li></a>
				</ul>
			</div>

			@if(Request::is('*/*') && !Request::is('/'))
				@if(Request::url() != URL::previous())
					<div id="back">	
						<a href="{{ URL::previous() }}"><input type="button" value="Go Back" style="width:200px; float:left; margin-bottom:15px;"></a>
					</div>
				@endif
			@endif
			<div id ="user">
				@if(Auth::check())
					Welcome back, {{{ Auth::user()->getName() }}} | <a href="/logout">Logout</a>
				@else
					You are not logged in.
				@endif
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
			<br style="clear:both;">
		</div>
	</body>
</html>
