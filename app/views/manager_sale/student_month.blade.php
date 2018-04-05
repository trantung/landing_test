@extends('admin.layout.default')

@section('title')
{{ $title='Danh sách học sinh' }}
@stop
@section('content')
	<div class="box box-primary">
		<table class ="table table-bordered table-striped table-hover">
			<tr>
				<th>Số học sinh mới trong tháng này</th>
				<th>Số học sinh trong tháng trước</th>
			</tr>
			<tr>
				<td>{{ count($dataNow) }}</td>
				<td>{{ count($dataPrevious) }}</td>
			</tr>
		</table>
	</div>
@stop