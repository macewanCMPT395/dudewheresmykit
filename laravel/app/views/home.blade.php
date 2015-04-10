@extends ('master')
@section ('content')
	<h2>Current Incoming Transfers</h2>
	<table>
		<tr>
			<th style="width:100px;">Event</th>
			<th style="width:100px;">Kit Type</th>
			<th style="width:150px;">Barcode</th>
			<th style="width:150px;">Event Start Date</th>
			<th style="width:100px;">Status</th>
		</tr>
		@foreach($incomingBookings as $booking)
			<tr onclick="window.location='{{url("/transfers")}}'">
				<td>{{{ $booking->event }}}</td>
				<td>{{{ $booking->kit->type->name }}}</td>
				<td>{{{ $booking->kit->code }}}</td>
				<td>{{{ $booking->start_date }}}</td>
				<td>{{{ $booking->status->description }}}</td>
			</tr>
		@endforeach
	</table>

	<h2>Current Outgoing Transfers</h2>
	<table>
		<tr>
			<th style="width:100px;">Kit Type</th>
			<th style="width:150px;">Barcode</th>
			<th style="width:150px;">Destination</th>
			<th style="width:100px;">Status</th>
		</tr>
		@foreach($outgoingBookings as $booking)
			<tr onclick="window.location='{{url("/transfers")}}'">
				<td>{{{ $booking->kit->type->name }}}</td>
				<td>{{{ $booking->kit->code }}}</td>
				<td>{{{ $booking->kit->branch->name }}} ({{{ $booking->kit->branch->code }}})</td>
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
			<tr onclick="window.location='{{url("/kits/$type->id")}}'">
				<td>{{{ $type->name }}}</td>
				<td>{{{ count($type->kits) }}}</td>
			</tr>
		@endforeach
	</table>
@stop
