@extends('master')

@section('content')

	{{ Form::open(array('url' => "items/update/$item->id")) }}

		<p>What is the problem with item {{{ $item->asset_tag }}}?</p>
		{{ Form::textarea('note') }} 
		
		<br>
		{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
