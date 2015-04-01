@extends('master')
@section('content')
	<h2>Incoming</h2>
	<table>
		<tr>
			<th style="width:200px;">Shipped</th>
			<th style="width:200px;">Start Date</th>
			<th style="width:300px;">Desintation Bracnh</th>
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
			<td>{{{ date('l, M d, Y', strtotime($booking->start_date)) }}}</td>
			<td>{{{ $booking->kit->branch->name }}}</td>
			<td>{{{ $booking->status->description }}}</td>
			<td>
				@if($booking->status->code == "S")
					<a href="{{{ url("/transfers/receive/$booking->id") }}}">Receive</a>	
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
			<th style="width:200px;">Start Date</th>
			<th style="width:300px;">Desintation Branch</th>
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
			<td>{{{ date('l, M d, Y', strtotime($booking->start_date)) }}}</td>
			<td>{{{ $booking->destination->name }}}</td>
			<td>{{{ $booking->status->description }}}</td>
			<td>
				@if($booking->status->code == "N") 
					<a href="{{{ url("/transfers/ship/$booking->id") }}}">Ship</a>	
				@else
					-
				@endif	
			</td>
			</tr>
		@endforeach
	</table>
@stop
