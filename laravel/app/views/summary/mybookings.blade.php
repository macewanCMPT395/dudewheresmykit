@extends ('master')
@section ('content')
	<table>
		<tr> 
			<th>Kit Name</th>
			<th>Start Date</th>
			<th>End Date</th>
		</tr>
		@foreach ($results as $result)
			<tr>
				<td>{{{ $result->description }}}</td>
				<td>{{{ $result->start_date }}}</td>
				<td>{{{ $result->end_date }}}</td>
			</tr>
		@endforeach
	</table>
@stop
