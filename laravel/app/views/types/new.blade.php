@extends('master')


@section('content')

	{{ Form::open(array('url' => 'types')) }}

		{{ Form::label('name', 'Kit Name') }}	
		{{ Form::text('name') }}
		
		<br>
		
		{{ Form::submit("Submit") }}
	{{ Form::close() }}
@stop
