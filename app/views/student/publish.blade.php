@extends('admin.layout.default')

@section('title')
{{ $title='Danh sách học sinh' }}
@stop
@section('content')
	<div class="margin-bottom">
	    @include('student.filter')
	</div>
	@if( count($data) )
		<div class="box box-primary">
			<table class ="table table-bordered table-striped table-hover">
				<tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Trình độ</th>
					<th>Học thử/chính thức</th>
					<th>Trạng thái</th>
					<th>Thao tác</th>
				</tr>
					@foreach($data as $key => $student)
						<tr>
							<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
							<td>{{ $student->full_name }}</td>
							<td>{{ $student->email }}</td>
							<td>{{ $student->phone }}</td>
							<td>{{ Common::getLevelName($student->level) }}</td>
							<td>{{ Common::getLessonTypeByStudent($student) }}</td>
							<td>
								@if(Common::checkSameSchedule($student->id))
	           					<a class="btn btn-danger">Trùng lịch</a>
								@else
	           					<a class="btn btn-primary">Không trùng</a>
	           					@endif
							</td>
							<td>
								{{ renderUrl('PublishController@show', 'Xem', [$student->id], ['class' => 'btn btn-primary']) }}
							</td>
						</tr>
					@endforeach
			</table>
			<div class="clear clearfix"></div>
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	@else
		<div class="alert alert-warning">Rất tiếc, không có dữ liệu hiển thị!</div>
	@endif
@stop