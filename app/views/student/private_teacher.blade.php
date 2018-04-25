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
					<th>{{ trans('common.order') }}</th>
					<th>{{ trans('common.fullname') }}</th>
					<th>Email</th>
					<th>Phone</th>
					<th>{{ trans('common.level') }}</th>
					<th>{{ trans('common.lesson_number') }}</th>
					<th>{{ trans('common.lesson_number_remain') }}</th>
					<th>{{ trans('common.hour_remain') }}</th>
					<th>{{ trans('common.lesson_number_finish') }}</th>
					<th>{{ trans('common.lesson_number_cancel') }}</th>
					<th>{{ trans('common.student_status') }}</th>
					<th>{{ trans('common.student_action') }}</th>
				</tr>
					@foreach($data as $key => $schedule)
						@if($schedule->student)
						<tr data-html="true" data-toggle="tooltip" data-placement="auto" title="<img src='{{ !empty($schedule->student->avatar) ? url($schedule->student->avatar) : NO_IMG }}' width='150px'>" >
							<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
							<td>{{ $schedule->student->full_name }}</td>
							<td>{{ $schedule->student->email }}</td>
							<td>{{ $schedule->student->phone }}</td>
							<td>{{ Common::getLevelName($schedule->student->level) }}</td>
							<td>{{ $schedule->lesson_number }}</td>
							<td>{{ Common::getNumberLessonRemainTeacher($schedule->teacher_id, $schedule->student_id) }}</td>
							<td>{{ Common::getDurationTimeStudentByStudent($schedule->student_id) }}</td>
							<td>{{ Common::getNumberLessonStatus($schedule->id, FINISH_LESSON) }}</td>
							<td>{{ Common::getNumberLessonStatus($schedule->id, CANCEL_LESSON) }}</td>
							<td>{{ Common::getStatusSchedule($schedule->id) }}</td>
							<td>
								@if($schedule->status != WAIT_APPROVE_GMO)
                        		{{ renderUrl('PublishController@showScheduleStudent', '<i class="fa fa-graduation-cap"></i>', [$schedule->id, $teacherId], ['class' => 'btn btn-primary', 'title' => trans('common.lesson_detail')]) }}
                        		{{ renderUrl('PublishController@stopScheduleStudent', '<i class="glyphicon glyphicon-edit"></i>', [$schedule->id, $teacherId], ['class' => 'btn btn-danger', 'title' => trans('common.student_pause')]) }}
								{{ Form::open(array('method'=>'POST', 'action' => array('PublishController@cancelStopScheduleStudent', $schedule->id, $teacherId), 'style' => 'display: inline-block;')) }}
		                            <button class="btn btn-primary" onclick="return confirm('{{trans('common.private_teacher_cancel_pause_message')}}');">{{ trans('common.private_teacher_cancel_pause') }}</button>
		                        {{ Form::close() }}
		                        @endif
							</td>
						</tr>
						@endif
					@endforeach
			</table>
			<div class="clear clearfix"></div>
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	@else
		<div class="alert alert-warning">{{ trans('common.no_data') }}</div>
	@endif
@stop