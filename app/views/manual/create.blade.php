@extends('admin.layout.default')
@stop
@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <!-- form start -->
            {{ Form::open(array('action' => 'AdminController@postAdd')) }}
            <div class="box-body col-sm-6">
                <div class="form-group">
                    <label for="username">Họ tên student</label>
                    <input type="text" class="form-control" id="full_name" name="full_name">
                </div>
                <div class="form-group">
                    <label for="username"> giao vien</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="username">so buoi con lai cua hoc sinh</label>
                    <input type="text" class="form-control"  id="remain_lesson" name="remain_lesson">
                </div>

                <!-- <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" required id="email" placeholder="Email" name="email">
                </div> -->
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
