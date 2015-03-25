@extends('master')

@section('content')

	{{ Form::open(array('url' => "items/update/$item->id")) }}

	{{ Form::label('note', "Note:") }}
	{{ Form::textarea('note') }} 
	
	<br>
	{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
