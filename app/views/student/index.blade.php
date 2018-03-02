@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý học sinh' }}
@stop
@section('content')

	<a href="{{ action('ManagerStudentController@create') }}" class="btn btn-primary " style=" background-color: green">Thêm người dùng mới</a>
	<table class ="table table-bordered table-striped table-hover">
		<tr>
			<th>Full name</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach($data as $key => $admin)
		<tr>
			<td>{{ $admin->username }}</td>
			<td>{{ $admin->email }}</td>
			<td>
	           <a href="{{ action('ManagerStudentController@edit', $admin->id) }}" class="btn btn-primary">Edit</a>
			</td>
			<td>
			   {{ Form::open(array('method'=>'DELETE', 'action' => array('AdminController@destroy', $admin->id), 'style' => 'display: inline-block;')) }}
	           <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Delete</button>
	           {{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</table>
@stop