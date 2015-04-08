@extends('master')

@section('content')
	@if(Auth::user()->permission_id >= 2) 
		<a href="{{{ url("/kits/create") }}}"><input type="button" value="Add a Kit"></a>
		<a href="{{{ url("/types/") }}}"><input type="button" value="Kit Type Management"></a>
		<br><br>
	@endif
	<div id="types"> 
		 <a href="{{{ url("kits") }}}"> All </a>  
		@foreach($types as $type) 
			| <a href="{{{ url("kits/" . $type->id) }}}">{{{ $type->name }}}</a> 
		@endforeach

		<br><br>
	</div>

	<table>
		<tr>
			<th style="width:100px;">Kit Type</th>
			<th style="width:110px;">Barcode</th>
			<th style="width:150px;">Notes</th>
			<th style="width:300px;">Control</th>
		</tr>

	@foreach($kits as $kit)
		<tr>
			<td>{{{ $kit->type->name }}}</td>
			<td>{{{ $kit->code }}}</td>
			<td @if($kit->note)style="color: #fff; background-color: red; font-weight:bold;"@endif>{{{ $kit->note }}}</td>
			<td>
				<a href="{{{ url("booking/$kit->id") }}}"><input type="button" value="Book it!"></a>
				<a href="{{{ url("kits/report/$kit->id") }}}"><input type="button" value="Report problem"></a>
				<a href="{{{ url("kits/show/$kit->id") }}}"><input type="button" value="Details"></a>
			</td>
		</tr>	
	@endforeach
@stop
