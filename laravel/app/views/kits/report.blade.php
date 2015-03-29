@extends('master')

@section('content')

	{{ Form::open(array('url' => "kits/update/$kit->id")) }}

		<p>What is the problem with kit {{{ $kit->description }}} ({{{ $kit->code }}})?</p>
		{{ Form::textarea('note') }} 
		
		<br>
		{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
