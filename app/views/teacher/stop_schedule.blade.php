@extends('admin.layout.default')

@section('title')
{{ $title=trans('common.teacher_stop_schedule_title') }}
@stop
@section('content')
    <div class="box box-primary">
        {{ Form::open([ 'action' => ['PublishController@postStopScheduleStudent', $scheduleId, $teacherId], 'method' => 'POST']) }}
        <div class="box-body row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password">{{ trans('common.teacher_stop_schedule_start') }}</label>
                    <input type="date" class="form-control" id="start_date" placeholder="date register" name="start_date" value="{{ date('Y-m-d', time()) }}">
                </div>
                 <div class="form-group">
                    <label for="password">{{ trans('common.teacher_stop_schedule_end') }}</label>
                    <input type="date" class="form-control" id="end_date" placeholder="date register" name="end_date" value="{{ date('Y-m-d', time()) }}">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
        {{ Form::close() }}
    </div>
    <!-- /.box -->
@stop