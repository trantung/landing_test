@extends('admin.layout.default')

@section('title')
@if( getRoleIdBySlug('gmo') == $admin->role_id )
    {{ $title='Sửa GMO | '.$admin->username }}
@else
    {{ $title='Sửa Admin | '.$admin->username }}
@endif
@stop
@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <div class="row margin-bottom">
        <div class="col-xs-12">
            @if( getRoleIdBySlug('gmo') == $admin->role_id )
                {{ renderUrl('AdminController@gmoIndex', 'Danh sách MMO', [], ['class' => 'btn btn-primary']) }}
            @else
                {{ renderUrl('AdminController@index', 'Danh sách Admin', [], ['class' => 'btn btn-primary']) }}
            @endif
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => array('AdminController@update', $admin->id), 'method' => "PUT")) }}
        <div class="box-body col-sm-6">
                <div class="form-group">
                    <label for="username">Họ tên</label>
                    {{  Form::text('full_name', $admin->full_name, array('class' => 'form-control', 'required' => 'required' )) }}
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    {{  Form::text('username', $admin->username, array('class' => 'form-control', 'required' => 'required' )) }}
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    {{  Form::text('email', $admin->email, array('class' => 'form-control', 'required' => 'required' )) }}
                </div>
                <div class="form-group disabled">
                    <label for="role_id">Phân quyền</label>
                    {{ Form::select('role_id', getRoleAdmin(), $admin->role_id, array('class' => 'form-control', 'required' => 'required' )) }}
                </div>
            </div>
            <div class="clear clearfix"></div>

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
