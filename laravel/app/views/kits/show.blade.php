@extends("master")

@section('content')
	@if($kit->note) 
		<div class="kitNote">{{{ $kit->note }}}</div>
	@endif
	<p>{{{ $kit->description }}}</p>
	<p><b>Bookings:</b></p>
	@foreach($kit->bookings as $booking) 
	<ul>
		<li>{{{ substr($booking->start_date,0,10) }}} till {{{ substr($booking->end_date,0,10) }}}</li>
	</ul>
	@endforeach
	<p><b>Kit Contains:</b></p>
	<ul>
	@foreach($kit->items as $item) 
		<li><b>{{{ $item->name }}}</b> (#{{{ $item->asset_tag }}}) | <a href="{{{ url("/items/report/$item->id") }}}">Report Problem</a> 
		@if(Auth::user()->permission_id >= 2) 
			| <a href="{{{ url("/items/edit/$item->id") }}}">Edit Item</a> |
			<a href="{{{ url("/items/destroy/$item->id") }}}" onclick="return confirm('Are you sure you want to delete item {{{ $item->name }}}?')">Delete</a> | 
		@endif
			@if($item->note) 
				<span class="itemNote">{{{ $item->note }}}</span>
			@endif
			<p>{{{ $item->description }}}</p>
	

		</li>
		
	@endforeach
	</ul>
	<div class="kitButton">
		<a href="{{{ url("kits/report/$kit->id") }}}"><input type="button" value="Report problem"></a>
		@if(Auth::user()->permission_id >= 2)
			<a href="{{{ url("kits/edit/$kit->id") }}}"><input type="button" value="Edit kit"></a>
			<a href="{{{ url("items/create/$kit->id") }}}"><input type="button" value="Add item"></a>
			<a href="{{{ url("kits/destroy/$kit->id") }}}" onclick="return confirm('Are you sure you want to delete kit {{{ $kit->code }}}?')"><input type="button" value="Delete kit"></a>
		@endif
	</div>

@stop
