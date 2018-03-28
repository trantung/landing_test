@extends('admin.layout.default')

@section('title')
{{ $title='Sửa giáo viên | '.$teacher->username }}
@stop
@section('content')

<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('ManagerTeacherController@index', 'Danh sách giáo viên', [], ['class' => 'btn btn-success']) }}
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <!-- form start -->
            {{ Form::open(array('action' => array('ManagerTeacherController@update', $teacher->id), 'method' => "PUT", 'files' => true)) }}
                <div class="box-body row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Họ tên <span class="text-warning">(*)</span></label>
                            {{ Form::text('full_name', $teacher->full_name, array('class' => 'form-control', 'required' => true)) }}
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-warning">(*)</span></label>
                            {{ Form::email('email', $teacher->email, array('class' => 'form-control', 'required' => true)) }}
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập <span class="text-warning">(*)</span></label>
                            {{ Form::text('username', $teacher->username, array('class' => 'form-control', 'required' => true)) }}
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            {{ Form::file('image_url', null, array('class' => 'form-control')) }}<br>
                            <img src="{{ file_exists(public_path().$teacher->image_url) ? url($teacher->image_url) : NO_IMG }}" width="150px" height="auto"  />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            {{ Form::text('phone', $teacher->phone, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            <label>Ngày đăng ký</label>
                            <input type="date" class="form-control" id="date_register" placeholder="date register" name="date_register" value="{{ $teacher->date }}">
                        </div>
                        <div class="form-group">
                            <label>Số tài khoản ngân hàng</label>
                            {{ Form::text('banking_number', $teacher->banking_number, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            <label>Trình độ</label>
                            {{ Form::select('level', Common::getLevelTeacherList(), $teacher->level, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            {{ Form::textarea('note', $teacher->note, array('class' => 'form-control', 'rows' => 3)) }}
                        </div>
                    </div>
                </div>
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