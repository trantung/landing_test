@extends('admin.layout.default')

@section('title')
@if( getRoleIdBySlug('gmo') == Input::get('role_id') )
    {{ $title='Thêm mới GMO' }}
@else
    {{ $title='Thêm mới Admin' }}
@endif
@stop
@section('content')

<div class="row margin-bottom">
    <div class="col-xs-12">
        @if( getRoleIdBySlug('gmo') == Input::get('role_id') )
            {{ renderUrl('AdminController@gmoIndex', 'Danh sách MMO', [], ['class' => 'btn btn-primary']) }}
        @else
            {{ renderUrl('AdminController@index', 'Danh sách Admin', [], ['class' => 'btn btn-primary']) }}
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <!-- form start -->
            {{ Form::open(array('action' => 'AdminController@store')) }}
            <div class="box-body col-sm-6">
                <div class="form-group">
                    <label for="username">Họ tên</label>
                    <input type="text" class="form-control" required id="full_name" placeholder="Họ và tên" name="full_name">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" required id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" required id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" required id="password" pattern="[0-9a-fA-F]{4,12}" placeholder="Password" name="password">
                </div>
                <div class="form-group disabled">
                    <label for="role_id">Phân quyền</label>
                    {{ Form::select('role_id', getRoleAdmin(), Input::get('role_id'), array('class' => 'form-control', 'required' => 'required' )) }}
                </div>
            </div>
            <div class="clear clearfix"></div>
            <!-- /.box-body -->

            <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Lưu lại" />
                <input type="reset" class="btn btn-default" value="Nhập lại" />
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>

@stop
