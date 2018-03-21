@extends('admin.layout.default')

@section('title')
{{ $title='Tạm dừng học sinh' }}
@stop
@section('content')
    <div class="box box-primary">
        {{ Form::open([ 'action' => ['PublishController@postStopScheduleStudent', $scheduleId, $teacherId], 'method' => 'POST']) }}
        <div class="box-body row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password">Ngày bắt đầu tạm dừng</label>
                    <input type="date" class="form-control" id="start_date" placeholder="date register" name="start_date" value="{{ date('Y-m-d', time()) }}">
                </div>
                 <div class="form-group">
                    <label for="password">Ngày kết thúc tạm dừng</label>
                    <input type="date" class="form-control" id="end_date" placeholder="date register" name="end_date" value="{{ date('Y-m-d', time()) }}">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Lưu lại" />
        </div>
        {{ Form::close() }}
    </div>
    <!-- /.box -->
@stop