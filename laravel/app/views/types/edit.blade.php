@extends('master')
@section('content')

	{{ Form::model($type, array('url' => "types/$type->id", 'method' => 'put')) }}

		{{ Form::label('name', 'Kit Name') }}	
		{{ Form::text('name') }}
		
		<br>
		
		{{ Form::submit("Submit") }}
	{{ Form::close() }}
@stop
