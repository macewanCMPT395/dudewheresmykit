@extends ('master')
@section ('content')
	<div id = "summary-table">
		<table>
			<tr>
				<th>Booking ID</th>
				<th>Branch</th> 
				<th>Kit Name</th>
				<th>Start Date</th>
				<th>End Date</th>
			</tr>
			@foreach ($results as $result)
				<tr>
					<td>{{{ $result->Bookings.id }}}</td>
					<td>{{{ $result->branch_code }}}</td>
					<td>{{{ $result->description }}}</td>
					<td>{{{ $result->start_date }}}</td>
					<td>{{{ $result->end_date }}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@stop
