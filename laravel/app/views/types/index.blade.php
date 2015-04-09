@extends("master")
@section("content")

	<a href="{{ url("/types/create") }}"><input type="button" value="Create New Kit Type"></a>
	<br><br>

	<table>
		<tr>
			<th>Kit Type Name</th>
			<th>Number of Kits</th>
			<th>Controls</th>
		</tr>
		@foreach($types as $type)
			<tr>
				<td>{{{ $type->name }}}</td>
				<td>{{{ $type->kits->count() }}}</td>
				<td>
					<a href="{{ url("/types/$type->id") }}"><input type="button" value="Details"></a>
					<a href="{{ url("/types/$type->id/edit") }}"><input type="button" value="Edit"></a>
					<a href="{{ url("/types/$type->id" . "/destroy") }}" onclick="return confirm('Are you sure you want to delete kit type {{{ $type->name }}}?')"><input type="button" id="destructive" value="Delete"></a>
				</td>
			</tr>
		@endforeach 
	</table>
@stop
