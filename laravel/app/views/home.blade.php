@extends ('master')
@section ('content')
	<h2>Current Incoming Bookings</h2>
	<table>
		<tr>
			<th style="width:100px;">Event</th>
			<th style="width:150px;">Start Date</th>
			<th style="width:150px;">End Date</th>
			<th style="width:100px;">Status</th>
		</tr>
		@foreach($incomingBookings as $booking) 
			<tr>
				<td>{{{ $booking->event }}}</td>
				<td>{{{ $booking->start_date }}}</td>
				<td>{{{ $booking->end_date }}}</td>
				<td>{{{ $booking->status->description }}}</td>
			</tr>
		@endforeach	
	</table>

	<h2>Awaiting Transfer</h2>
	<table>
		<tr>	
			<th style="width:100px;">Event</th>
			<th style="width:150px;">Start Date</th>
			<th style="width:150px;">End Date</th>
			<th style="width:100px;">Status</th>
		</tr>
		@foreach($outgoingBookings as $booking) 
			<tr>
				<td>{{{ $booking->event }}}</td>
				<td>{{{ $booking->start_date }}}</td>
				<td>{{{ $booking->end_date }}}</td>
				<td>{{{ $booking->status->description }}}</td>
			</tr>
		@endforeach	
	</table>
		
	<h2>New Kit Types</h2>
	<table>
		<tr>
			<th>Kit Type</th>
			<th>Amount of Kits</th>
		</tr>
		@foreach($newKitTypes as $type) 
			<tr>
				<td>{{{ $type->name }}}</td>
				<td>{{{ count($type->kits) }}}</td>
			</tr>
		@endforeach	
	</table>
@stop
