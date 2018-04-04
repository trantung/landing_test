@extends('admin.layout.default')

@section('title')
@if( Request::segment(2) == GMO )
    {{ $title='Quản lý GMO' }}
@else
    {{ $title='Quản lý Admin' }}
@endif
@stop
@section('content')
    <div class="row margin-bottom">
        <div class="col-xs-12">
            @if( Request::segment(2) == GMO )
                {{ renderUrl('AdminController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm GMO mới', ['role_id' => getRoleIdBySlug('gmo')], ['class' => 'btn btn-primary']) }}
            @else
                {{ renderUrl('AdminController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm thành viên mới', [], ['class' => 'btn btn-primary']) }}
            @endif
        </div>
    </div>
    <div class="margin-bottom">
        @include('administrator.filter')
    </div>
    <table class ="table table-bordered table-striped table-hover">
        <tr>
            <th>STT</th>
            <th>Username</th>
            <th>Username</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Ghi chú</th>
            <th width="145px">Thao tác</th>
        </tr>
        @foreach($data as $key => $admin)
        <tr>
            <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
            <td>{{ $admin->full_name }}</td>
            <td>{{ $admin->username }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ getRoleNameById($admin->role_id) }}</td>
            <td>{{ $admin->comment }}</td>
            <td>
                {{ renderUrl('AdminController@edit', '<i class="glyphicon glyphicon-edit"></i>', [$admin->id], ['class' => 'btn btn-warning', 'title' => 'Sửa']) }}
                <a href="{{ action('AdminController@getResetPass', $admin->id) }} " class="btn btn-warning" title="Đổi mật khẩu"><i class="fa fa-key"></i></a>
                {{ Form::open(array('method'=>'DELETE', 'action' => array('AdminController@destroy', $admin->id), 'style' => 'display: inline-block;')) }}
                    <button class="btn btn-danger" title="xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-trash"></i></button>
                {{ Form::close() }}
            </td>
            
        </tr>
        @endforeach
    </table>
    <div class="clear clearfix"></div>
    {{ $data->appends(Request::except('page'))->links() }}
@stop