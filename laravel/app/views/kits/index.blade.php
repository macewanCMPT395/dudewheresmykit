@extends('master')

@section('content')
	@if(Auth::user()->permission_id >= 2) 
		<a href="{{{ url("/kits/create") }}}"><h2 style="margin:5px 5px 5px 5px;">Add a kit</h2></a>
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
			@if($kit->note)
				<td style="color: #fff; background-color: red; font-weight:bold;">{{{ $kit->note }}}</td>
			@else
				<td></td>
			@endif
			<td>
				<a href="{{{ url("booking/$kit->id") }}}"><input type="button" value="Book it!"></a>
				<a href="{{{ url("kits/report/$kit->id") }}}"><input type="button" value="Report problem"></a>
				<a href="{{{ url("kits/show/$kit->id") }}}"><input type="button" value="Details"></a>
			</td>
		</tr>	
	@endforeach
@stop
