@extends('master')


@section('content')

	{{ Form::model($kit, array('url' => "kits/update/$kit->id")) }}

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

	{{ Form::label('note', "Note") }}
	{{ Form::textarea('note') }}
	
	<br>
	
	{{ Form::submit("Submit") }}
	{{ Form::close() }}
	
	<br><br><br>
	<a href="{{ url("kits/destroy/$kit->id") }}" onclick="return confirm('Are you sure you want to delete kit {{ $kit->code }}?')"><input type="button" value="Delete kit"></a>
@stop
