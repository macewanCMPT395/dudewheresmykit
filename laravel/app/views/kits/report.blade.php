@extends('master')

@section('content')

	{{ Form::open(array('url' => "kits/update/$kit->id")) }}

		<p>What is the problem with kit {{{ $kit->code }}}?</p>
		{{ Form::textarea('note') }} 
		
		<br>
		{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
