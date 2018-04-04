@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý giáo viên' }}
@stop
@section('content')
    
    <div class="margin-bottom">
        {{ renderUrl('ManagerTeacherController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm giáo viên mới', [], ['class' => 'btn btn-primary']) }}
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
                <tr data-html="true" data-toggle="tooltip" data-placement="auto" title="<img src='{{ !empty($teacher->image_url) ? url($teacher->image_url) : NO_IMG }}' width='150px'>" >
                    <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
                    <td>{{ $teacher->full_name }}</td>
                    <td>{{ $teacher->username }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ Common::getTotalStudentOfTeacher($teacher->id) }}</td>
                    <td>{{ Common::getHourTeachOfTeacher($teacher->id) }}</td>
                    <td>{{ Common::getHourCancelOfTeacher($teacher->id) }}</td>
                    <td>
                        {{ renderUrl('PublishController@privateStudent', '<i class="fa fa-graduation-cap"></i>', ['teacher_id' => $teacher->id], ['class' => 'btn btn-primary', 'title' => 'Danh sách học sinh']) }}
                        @if( hasRole('gmo') )
                            <button type="button" title="Nhận xét của GMO" class="btn btn-primary" data-toggle="modal" data-target="#commentTeacherModal-{{ $teacher->id }}"><i class="glyphicon glyphicon-comment"></i></button>
                            @include('teacher.comment_form')
                        @endif
                        {{ renderUrl('ManagerTeacherController@edit', '<i class="glyphicon glyphicon-edit"></i>', [$teacher->id], ['class' => 'btn btn-warning', 'title' => 'Sửa']) }}
                        <a href="{{ action('ManagerTeacherController@getResetPass', $teacher->id) }} " class="btn btn-warning" title="Đổi mật khẩu"><i class="fa fa-key"></i></a>
                        {{ Form::open(array('method'=>'DELETE', 'action' => array('ManagerTeacherController@destroy', $teacher->id), 'style' => 'display: inline-block;')) }}
                            <button class="btn btn-danger" title="xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-trash"></i></button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="clear clearfix"></div>
        {{ $data->appends(Request::except('page'))->links() }}
    </div>
@stop