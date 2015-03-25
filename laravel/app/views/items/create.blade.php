@extends('master')


@section('content')

	{{ Form::open(array('url' => "items/store/$kit->id")) }}
		{{ Form::label('asset_tag', 'Asset Tag') }}	
		{{ Form::text('asset_tag', '31221' ) }}
		
		<br>

		{{ Form::label('name', 'Name of Item') }}	
		{{ Form::text('name') }}

		<br>
		
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description') }}

		<br>
		
		{{ Form::submit("Submit") }}
	{{ Form::close() }}
@stop
