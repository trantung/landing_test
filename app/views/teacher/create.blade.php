@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới giáo viên' }}
@stop
@section('content')

    <div class="margin-bottom">
        {{ renderUrl('ManagerTeacherController@index', 'Danh sách giáo viên', [], ['class' => 'btn btn-success']) }}
    </div>
    <div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => 'ManagerTeacherController@store', 'files' => true)) }}
        <div class="box-body row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Họ tên <span class="text-warning">(*)</span></label>
                    {{ Form::text('full_name', null, array('class' => 'form-control', 'required' => true)) }}
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-warning">(*)</span></label>
                    <input type="email" class="form-control" required id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="username">Tên đăng nhập <span class="text-warning">(*)</span></label>
                    <input type="text" class="form-control" required id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-warning">(*)</span></label>
                    <input type="password" class="form-control" required id="password" pattern="[0-9a-fA-F]{4,12}" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label for="password">Ảnh đại diện</label>
                    {{ Form::file('image_url', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    <label for="password">Số điện thoại</label>
                    {{ Form::text('phone', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    <label for="password">Ngày đăng ký</label>
                    <input type="date" class="form-control" id="date_register" placeholder="date register" name="date_register" value="{{ date('Y-m-d', time()) }}">
                </div>
                <div class="form-group">
                    <label for="password">Số tài khoản ngân hàng</label>
                    {{ Form::textarea('banking_number', null, array('class' => 'form-control', 'rows' => 9)) }}
                </div>
                <div class="form-group">
                    <label>Trình độ</label>
                    {{ Form::select('level', Common::getLevelTeacherList(), null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label>Chọn GMO</label>
                    {{ Form::select('admin_id', Common::getGmo(), null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="password">Ghi chú</label>
                    {{ Form::text('note', null, array('class' => 'form-control', 'rows' =>9, 'id' => 'editor1')) }}
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
@include('admin.common.ckeditor')
    <!-- /.box -->
@stop