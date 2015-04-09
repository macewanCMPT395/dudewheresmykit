@extends('master')
@section('content')
	<h2>Incoming</h2>
	<table>
		<tr>
			<th style="width:200px;">Shipped</th>
			<th style="width:250px;">Event Name</th>
			<th style="width:100px;">Kit Name</th>
			<th style="width:200px;">Kit Barcode</th>
			<th style="width:200px;">Event Start Date</th>
			<th style="width:100px;">Status</th>
			<th style="width:100px;">Controls</th>
		</tr>
		@foreach($in as $booking) 
			@if ($booking->status->code == 'S') 
				<tr style="font-weight:bold;">
			@else
				<tr style="background-color: #ddd; font-style:italic;">
			@endif
			<td>
				@if($booking->shipped)
					{{{ date('l, M d, Y',strtotime($booking->shipped)) }}}
				@else
					Not Yet Shipped
				@endif
			</td>
			<td>{{{ $booking->event }}}</td>
			<td>{{{ $booking->kit->type->name }}}</td>
			<td>{{{ $booking->kit->code }}}</td>
			<td>{{{ date('l, M d, Y', strtotime($booking->start_date)) }}}</td>
			<td>{{{ $booking->status->description }}}</td>
			<td>
				@if($booking->status->code == "S")
					<a href="{{{ url("/transfers/receive/$booking->id") }}}"><input type="button" value="Receive"></a>	
				@else
					-
				@endif
			</td>
			</tr>
		@endforeach
	</table>

	<h2>Outgoing</h2>
	<table>
		<tr>
			<th style="width:200px;">Date to Ship</th>
			<th style="width:150px;">Kit Type</th>
			<th style="width:200px;">Kit Barcode</th>
			<th style="width:200px;">Destination Branch</th>
			<th style="width:100px;">Status</th>
			<th style="width:100px;">Controls</th>
		</tr>
		@foreach($out as $booking) 
			@if($booking->status->code != 'N')
				<tr style="background-color: #ddd; font-style:italic;">
			@else
				<tr style="font-weight:bold;">
			@endif
			<td>{{{ $booking->ship_date }}}</td>
			<td>{{{ $booking->kit->type->name }}}</td>
			<td>{{{ $booking->kit->code }}}</td>
			<td>{{{ $booking->destination->name }}}</td>
			<td>{{{ $booking->status->description }}}</td>
			<td>
				@if($booking->status->code == "N" && date('mdy',strtotime($booking->ship_date)) == date('mdy',strtotime('now')))
					<a href="{{{ url("/transfers/ship/$booking->id") }}}"><input type="button" value="Ship"></a>	
				@else
					-
				@endif	
			</td>
			</tr>
		@endforeach
	</table>
@stop
