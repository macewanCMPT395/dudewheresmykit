@extends('master')


@section('content')

	{{ Form::open(array('url' => "items/store/$kit->id")) }}
		{{ Form::label('asset_tag', 'Asset Tag') }}	
		{{ Form::text('asset_tag', '' ) }}
		
		<br>

		{{ Form::label('name', 'Name of Item') }}	
		{{ Form::text('name') }}

		<br>
		
		{{ Form::submit("Submit") }}
	{{ Form::close() }}
@stop
