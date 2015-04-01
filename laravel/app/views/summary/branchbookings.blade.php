@extends ('master')

@section ('content')
	<table>
		<tr> 
			<th>Booking ID</th>
			<th>Booked By</th>
			<th>Kit Name</th>
			<th>Destination Branch</th>
			<th>Start Date</th>
			<th>End Date</th>
		</tr>
		@foreach ($results as $result)
			<tr>
				<td>{{{ $result->id }}}</td>
				<td>{{{ $result->first_name}}} {{{ $result->last_name }}}</td>
				<td>{{{ $result->description }}}</td>
				<td>{{{ $result->branch_code }}}</td>
				<td>{{{ $result->start_date }}}</td>
				<td>{{{ $result->end_date }}}</td>
			</tr>
		@endforeach
	</table>
@stop
