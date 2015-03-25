@extends('master')


@section('content')

	{{ Form::open(array('url' => 'kits/store')) }}

	{{ Form::label('code', 'Barcode') }}	
	{{ Form::text('code') }}
	
	<br>

	{{ Form::label('type_id', 'Type of Kit') }}	
	{{ Form::select('type_id', $types) }}

	<br>

	{{ Form::label('branch_id', "Current Branch") }}
	{{ Form::select('branch_id', $branches) }} 

	<br>
	
	{{ Form::label('description', 'Description') }}
	{{ Form::textarea('description') }}

	<br>
	
	{{ Form::submit("Submit") }}
	{{ Form::close() }}
@stop
