@extends('master')

@section('content')

	{{ Form::open(array('url' => "kits/update/$kit->id")) }}

	{{ Form::label('note', "Note:") }}
	{{ Form::textarea('note') }} 
	
	<br>
	{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
