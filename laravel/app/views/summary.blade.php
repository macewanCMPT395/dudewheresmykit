@extends('master')
@section('content')
	<div id="table_content">
		<div id="table_filter">
			{{ Form::open(array('action' => 'SummaryController@index')) }}
				<?php 
					$branchArray = array('mybookings' => 'My Bookings');
					$count = 0;
					$found = (!isset($curBranch)||$curBranch == 'mybookings')?1:0;
					foreach ($branches as $branch) {
						$branchArray[$branch->id] = "$branch->code - $branch->name";
						if(!$found) {
							++ $count;
							if($branch->id == $curBranch) $found = 1;
						}
					}
					echo Form::select('branch', $branchArray, array('selectedIndex' => $count));
				?>	
				{{ Form::submit('Update'); }}
			{{ Form::close() }}
		</div>
		<table>
			<tr> 
				<th>Event</th>
				<th>Kit Type</th>
				<th>Branch Code</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Created By</th>
				<th>Controls</th>
			</tr>
			@foreach ($bookings as $booking)
				<tr>
					<td>{{{ $booking->event }}}</td>
					<td>{{{ $booking->kit->description }}}</td>
					<td>{{{ $booking->destination->code }}}</td>
					<td>{{{ $booking->start_date }}}</td>
					<td>{{{ $booking->end_date }}}</td>
					<td>{{{ $booking->users[0]->first_name }}} {{{ $booking->users[0]->last_name }}}</td>
					<td><input type="submit" name="delete_button" value="Delete" onclick="window.location='/bookings/destroy/{{{ $booking->id }}}'"></td>
				</tr>
			@endforeach
		</table>
	</div>
@stop
