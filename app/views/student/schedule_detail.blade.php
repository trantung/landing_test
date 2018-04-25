@extends('admin.layout.default')

@section('title')
{{ $title=trans('common.student_schedule_detail').': '. $student->full_name }}
@stop
@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('PublishController@privateStudent', trans('common.student_schedule_detail_private'), ['teacher_id' => $teacherId], ['class' => 'btn btn-primary']) }}
    </div>
</div>
    @if( count($data) )
        <div class="box box-primary">
            <table class ="table table-bordered table-striped table-hover">
                <tr>
                    <th>{{ trans('common.order') }}</th>
                    <th>{{ trans('common.student_schedule_detail_date') }}</th>
                    <th>{{ trans('common.student_schedule_detail_date_name') }}</th>
                    <th>{{ trans('common.status') }}</th>
                    <th>{{ trans('common.action') }}</th>
                </tr>
                @foreach($data as $key => $scheduleDetail)
                    <tr>
                        <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
                        <td>{{ $scheduleDetail->lesson_date }} {{ $scheduleDetail->lesson_hour }}</td>
                        <td>
                            {{ Common::getNameDateByTimeId($scheduleDetail->time_id) }}
                        </td>
                        <td>{{ getStatusScheduleDetail($scheduleDetail->status) }}</td>
                        <td>
                            @if(Common::checkTimeConfirm($scheduleDetail->id, $teacherId))
                                {{ renderUrl('PublishController@showScheduleDetail', trans('common.student_schedule_detail_see'), [$scheduleDetail->id, $teacherId], ['class' => 'btn btn-primary']) }}
                            @else
                                {{ trans('common.student_schedule_detail_not_see') }}
                            @endif
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