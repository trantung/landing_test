@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý giáo viên' }}
@stop
@section('content')
	
	<div class="margin-bottom">
    	{{ renderUrl('ManagerTeacherController@create', 'Thêm giáo viên mới', [], ['class' => 'btn btn-primary']) }}
	</div>
	<div class="margin-bottom">
	    @include('teacher.filter')
	</div>
	<div class="box box-primary">
		<table class ="table table-bordered table-striped table-hover">
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Tên đăng nhập</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Tổng số học viên</th>
				<th>Số giờ đã dạy</th>
				<th>Số giờ đã hủy</th>
				<th>Thao tác</th>
			</tr>
			@foreach($data as $key => $teacher)
				<tr>
					<td>#{{ $key+1 }}</td>
					<td>{{ $teacher->full_name }}</td>
					<td>{{ $teacher->username }}</td>
					<td>{{ $teacher->email }}</td>
					<td>{{ $teacher->phone }}</td>
					<td>{{ Common::getTotalStudentOfTeacher($teacher->id) }}</td>
					<td>{{ Common::getHourTeachOfTeacher($teacher->id) }}</td>
					<td>{{ Common::getHourCancelOfTeacher($teacher->id) }}</td>
					<td>
						{{ renderUrl('PublishController@privateStudent', 'Danh sách học sinh', ['teacher_id' => $teacher->id], ['class' => 'btn btn-primary']) }}
						{{ renderUrl('ManagerTeacherController@edit', 'Sửa', [$teacher->id], ['class' => 'btn btn-primary']) }}
						<a href="{{ action('ManagerTeacherController@getResetPass', $teacher->id) }} " class="btn btn-warning">Đổi mật khẩu</a>
				   		{{ Form::open(array('method'=>'DELETE', 'action' => array('ManagerTeacherController@destroy', $teacher->id), 'style' => 'display: inline-block;')) }}
			           		<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
		           		{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@stop