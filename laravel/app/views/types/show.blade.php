@extends("master")

@section('content')
	<a href="{{ url("types/") }}"><input type="button" value="All Kit Types"></a>
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
