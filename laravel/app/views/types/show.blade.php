@extends("master")

@section('content')
	<a href="{{ url("types/") }}"><input type="button" value="All Kit Types"></a>
	<a href="{{ url("types/$type->id/edit") }}"><input type="button" value="Edit Type"></a>
	<a href="{{ url("types/$type->id/destroy") }}" onclick="return confirm('Are you sure you want to delete kit type {{{ $type->name }}}?')"><input type="button" id="destructive" value="Delete Type"></a>
	<br><br>
	<table>
		<tr>
			<th>Barcode</th>
			<th>Kit Name</th>
			<th>Controls</th>
		</tr>
		@foreach($type->kits as $kit) 
			<tr>
				<td>{{{ $kit->code }}}</td>
				<td>{{{ $kit->description }}}</td>
				<td><a href="{{ url("kits/show/" . $kit->id) }}"><input type="button" value="Kit Details"></a></td>
			</tr>
		@endforeach
	</table>
@stop
