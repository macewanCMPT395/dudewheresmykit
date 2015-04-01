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
	<table style="margin: 0 0 0 0;">
		<tr>
			<th style="width:90px;">Item #</th>
			<th style="width:300px;">Name</th>
			<th style="width:200px;">Note</th>
			<th style="width:100px;">Controls</th>
		</tr>
		@foreach($kit->items as $item) 
			<tr>
				<td style="width:90px;"><b>{{{ $item->asset_tag }}}</b></td>
				<td style="width:300px;"><b>{{{ $item->name }}}</b></td>
				<td style="width:200px;">{{{ $item->note }}}</td> 
				<td style="width:100px;"><a href="{{{ url("/items/report/$item->id") }}}">Report Problem</a> 
					@if(Auth::user()->permission_id >= 2) 
						<br><a href="{{{ url("/items/edit/$item->id") }}}">Edit Item</a>
						<br><a href="{{ url("/items/destroy/$item->id") }}" onclick="return confirm('Are you sure you want to delete item {{{ $item->name }}}?')">Delete</a>
					@endif
				</td>
			</tr>
			</table>
			<table style="margin: 0 0 0 0;">
				<tr>	
					<td style="width:100%;padding-top:20px;padding-bottom:20px;font-style:italic;">
						{{{ $item->description }}} 	
					</td>
				</tr>
			</table>
			<table style="margin:0 0 0 0;">
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
