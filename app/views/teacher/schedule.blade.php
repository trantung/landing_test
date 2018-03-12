@extends('admin.layout.default')

@section('title')
{{ $title='Lịch dạy' }}
@stop
@section('content')
	<table class ="table table-bordered table-striped table-hover">
		<tr>
			<th>STT</th>
			<th>Ngày giờ học</th>
			<th>Phone</th>
			<th>Edit</th>
			<th>Reset password</th>
			<th>Delete</th>
		</tr>
	</table>
@stop