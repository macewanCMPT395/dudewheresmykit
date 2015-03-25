@extends('master')


@section('content')

	{{ Form::model($item, array('url' => "items/update/$item->id")) }}

	{{ Form::label('asset_tag', 'Asset Tag') }}	
	{{ Form::text('asset_tag') }}
	
	<br>

	{{ Form::label('name', 'Name of Item') }}	
	{{ Form::text('name') }}

	<br>
	
	{{ Form::label('description', 'Description') }}
	{{ Form::textarea('description') }}

	<br>

	{{ Form::label('note', "Note") }}
	{{ Form::textarea('note') }}

	<br>
	
	{{ Form::submit("Submit") }}
	{{ Form::close() }}
@stop
