@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý admin' }}
@stop
@section('content')

	<a href="{{ action('ManagerTeacherController@create') }}" class="btn btn-primary " style=" background-color: green">Thêm giáo viên mới</a>
	<table class ="table table-bordered table-striped table-hover">
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Edit</th>
			<th>Reset password</th>
			<th>Delete</th>
		</tr>
		@foreach($data as $key => $teacher)
		<tr>
			<td>{{ $teacher->username }}</td>
			<td>{{ $teacher->email }}</td>
			<td>{{ $teacher->phone }}</td>
			<td>
	           <a href="{{ action('ManagerTeacherController@edit', $teacher->id) }}" class="btn btn-primary">Edit</a>
			</td>
			</td>
			<td><a href="{{ action('ManagerTeacherController@getResetPass', $teacher->id) }} " class="btn btn-warning">Reset password</a></td>
			<td>
			   {{ Form::open(array('method'=>'DELETE', 'action' => array('ManagerTeacherController@destroy', $teacher->id), 'style' => 'display: inline-block;')) }}
	           <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Delete</button>
	           {{ Form::close() }}
			
		</tr>
		@endforeach
	</table>
@stop