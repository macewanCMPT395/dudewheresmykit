@extends('master')

@section('content')

	{{ Form::open(array('url' => "kits/update/$kit->id")) }}

		<p>Please report any problems with kit {{{ $kit->code }}}</p>
		{{ Form::textarea('note') }} 
		
		<br>
		{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
