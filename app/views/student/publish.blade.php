@extends('admin.layout.default')

@section('title')
{{ $title=trans('common.student_publish_detail_title') }}
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
					<th>{{ trans('common.student_publish_study_status') }}</th>
					<th>{{ trans('common.student_status') }}</th>
					<th>{{ trans('common.student_action') }}</th>
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
	           					<a class="btn btn-danger">{{ trans('common.student_publish_same_date') }}</a>
								@else
	           					<a class="btn btn-primary">{{ trans('common.student_publish_not_same_date') }}</a>
	           					@endif
							</td>
							<td>
								{{ renderUrl('PublishController@show', trans('common.see'), [$student->id], ['class' => 'btn btn-primary']) }}
							</td>
						</tr>
					@endforeach
			</table>
			<div class="clear clearfix"></div>
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	@else
		<div class="alert alert-warning">{{ trans('common.no_data') }}</div>
	@endif
@stop