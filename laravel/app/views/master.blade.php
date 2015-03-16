<!DOCTYPE html>
<html>
<head>
    @if(isset($title))
        <title>KIT-MTS | {{{ title }}}</title>
    @else
        <title>KIT-MTS</title>    
    @endif
    <meta charset="UTF-8">
    {{ HTML::style("css/master.css") }}
</head>
<body>
      <div id ="user">
                @if(Auth::check()) 
                    Welcome back, {{{ Auth::user()->Username }}} | <a href="#">Logout</a>
                @else
                    You are not logged in.
                @endif
        </div>

    <div id="container">
        <div id="banner">
            <span id="logo">
                EPL
            </span>
            <ul id="menu">
                <a href="/booking" id="menuItem1" ><li>Book a kit</li></a>
                <a href="#" id="menuItem2" ><li>View kits</li></a>
                <a href="#" id="menuItem3" ><li>Summary</li></a>
                <a href="#" id="menuItem4" ><li>Help</li></a>
                <a href="#" id="menuItem5" ><li>Account</li></a>
            </ul>
        </div>
     
            <br style="clear:both;">

            @if(Session::has('errors'))

            @endif

            @if(Session::has('message'))

            @endif

        

        <div id="side">
            </h1> Summary </h1>
                 <div id="content">
                    @yield ('sidebar')
            </div>
         </div>
        <div id="main">
            </h1> @yield ('head') </h1>
            <div id= "content">
                @yield ('content')
                
            </div>
        </div>    <br style="clear:both;">
        </div>
    </div>
</body>

</html>
