@extends('master')


@section('content')

	{{ Form::model($item, array('url' => "items/update/$item->id")) }}

		{{ Form::label('asset_tag', 'Asset Tag') }}	
		{{ Form::text('asset_tag') }}
		
		<br>

		{{ Form::label('name', 'Name of Item') }}	
		{{ Form::text('name') }}

		<br>

		{{ Form::label('note', "Note") }}
		{{ Form::textarea('note') }}

		<br>
		
		{{ Form::submit("Submit") }}
		<a href="{{ url("items/destroy/$item->id") }}" onclick="return confirm('Are you sure you want to delete item {{ $item->asset_tag }}?')"><input type="button" value="Delete Item" id="destructive"></a>
	{{ Form::close() }}
@stop
