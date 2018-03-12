@extends('admin.layout.default')

@section('title')
{{ $title='Lịch học chi tiết học sinh: '. $student->full_name }}
@stop
@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('PublishController@privateStudent', 'Danh sách học sinh cá nhân', ['teacher_id' => $teacherId], ['class' => 'btn btn-primary']) }}
    </div>
</div>
    @if( count($data) )
        <div class="box box-primary">
            <table class ="table table-bordered table-striped table-hover">
                <tr>
                    <th>STT</th>
                    <th>Ngày giờ học</th>
                    <th>Thứ trong tuần</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                    @foreach($data as $key => $scheduleDetail)
                        <tr>
                            <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
                            <td>{{ $scheduleDetail->lesson_date }} {{ $scheduleDetail->lesson_hour }}</td>
                            <td>Thứ {{ $scheduleDetail->time_id }}</td>
                            <td>{{ getStatusScheduleDetail($scheduleDetail->status) }}</td>
                            
                            <td>
                                {{ renderUrl('PublishController@showScheduleDetail', 'Xem chi tiết', [$scheduleDetail->id, $teacherId], ['class' => 'btn btn-primary']) }}
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