@extends('admin.layout.default')

@section('title')
{{ $title=trans('common.lesson_detail_detail').$student->full_name }}
@stop
lesson_detail_detail
@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('PublishController@showScheduleStudent', trans('common.lesson_detail'), [$lessonDetail->schedule_id, $teacherId], ['class' => 'btn btn-primary']) }}
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('PublishController@updateScheduleDetail', $lessonDetail->id, $teacherId), 'method' => "POST")) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset>
                                <div class="time_disable">
                                    <div class="input-group inline-block col-sm-4" >
                                        <label>{{ trans('common.lesson_detail_chosse_date') }}</label>
                                        <input type="date" class="lesson_date form-control" placeholder="Ngày vào học" name="lesson_date" value="{{ $lessonDetail->lesson_date }}" disabled>
                                    </div>
                                    <div class="input-group inline-block col-sm-4" >
                                        <label>{{ trans('common.lesson_detail_chosse_hour') }}</label>
                                        {{ Form::text('lesson_hour', $lessonDetail->lesson_hour, ['class' => 'form-control timepicker lesson_hour', 'disabled' => true]) }}
                                    </div>
                                    <div class="input-group inline-block col-sm-4" >
                                        <label>{{ trans('common.lesson_detail_chosse_time') }}</label>
                                        {{  Form::select('lesson_duration', getDurationLesson(), $lessonDetail->lesson_duration, array('class' => 'form-control', 'rows' => 3, 'disabled' => true)) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.lesson_detail_comment') }}</label>
                                    {{  Form::textarea('comment', '', array('class' => 'form-control', 'rows' => 3 )) }}
                                </div>
                                <div class="input-group inline-block col-sm-4" >
                                    <label>{{ trans('common.student_status') }}</label>
                                    {{  Form::select('status', getStatusLesson(), $lessonDetail->status, array('class' => 'form-control select_status_lesson', 'rows' => 3 )) }}
                                </div>
                            </fieldset>
                        </div>
                    </div> 
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('common.save') }}</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop