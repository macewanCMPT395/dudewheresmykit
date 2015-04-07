@extends("master")

@section('content')
	@if($kit->note) 
		<div class="kitNote">{{{ $kit->note }}}</div>
	@endif
	<p>{{{ $kit->description }}}</p>
	<p><b>Bookings:</b></p>
	<table>
		<tr>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Location</th>
		</tr>
		@foreach($kit->bookings as $booking) 
			<tr>
				<td>{{{ substr($booking->start_date,0,10) }}}</td>
				<td>{{{ substr($booking->end_date,0,10) }}}</td>
				<td>{{{ $booking->destination->name }}}</td>
			</tr>
		@endforeach
	</table>
	<p><b>Kit Contains:</b></p>
	<table>
		<tr>
			<th style="width:90px;">Item #</th>
			<th style="width:150px;">Name</th>
			@if(Auth::user()->permission_id >= 2)
				<th style="width:250px;">Note</th>
				<th style="width:350px;">Controls</th>
			@else 
				<th style="width:400px;">Note</th>
				<th style="width:200px;">Controls</th>
			@endif
		</tr>
		@foreach($kit->items as $item) 
			<tr>
				<td><b>{{{ $item->asset_tag }}}</b></td>
				<td><b>{{{ $item->name }}}</b></td>
				<td>{{{ $item->note }}}</td> 
				<td><a href="{{{ url("/items/report/$item->id") }}}"><input type="button" value="Report Problem"></a> 
					@if(Auth::user()->permission_id >= 2) 
						<a href="{{{ url("/items/edit/$item->id") }}}"><input type="button" value="Edit Item"></a>
						<a href="{{ url("/items/destroy/$item->id") }}" onclick="return confirm('Are you sure you want to delete item {{{ $item->name }}}?')"><input type="button" value="Delete Item" id="destructive"></a>
					@endif
				</td>
			</tr>
		@endforeach
	</table>

	<div class="kitButton">
		<a href="{{{ url("kits/report/$kit->id") }}}"><input type="button" value="Report problem"></a>
		@if(Auth::user()->permission_id >= 2)
			<a href="{{{ url("kits/edit/$kit->id") }}}"><input type="button" value="Edit kit"></a>
			<a href="{{{ url("items/create/$kit->id") }}}"><input type="button" value="Add item"></a>
			<a href="{{{ url("kits/destroy/$kit->id") }}}" onclick="return confirm('Are you sure you want to delete kit {{{ $kit->code }}}?')"><input type="button" value="Delete kit" id="destructive"></a>
		@endif
	</div>
@stop
