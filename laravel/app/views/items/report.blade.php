@extends ('master')

@section ('content')

	{{ Form::open(array('url' => "items/update/$item->id")) }}

		<p>Please record any problems with item {{{ $item->name }}} ({{{ $item->asset_tag }}})?</p>
		{{ Form::textarea('note') }} 
		
		<br>
		{{ Form::submit("Submit") }}
	{{ Form::close() }}

@stop
