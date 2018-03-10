@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý admin' }}
@stop
@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="{{ action('ManagerTeacherController@index') }}" class="btn btn-success">Danh sách giáo viên</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
        <!-- form start -->
        {{ Form::open(array('action' => 'ManagerTeacherController@store', 'files' => true)) }}
          <div class="box-body">
            <div class="form-group">
              <label for="email">Email</label>
                <div class="row">
                  <div class="col-sm-6">
                    <input type="email" class="form-control" required id="email" placeholder="Email" name="email">
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="text" class="form-control" required id="username" placeholder="Username" name="username">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="row">
              	<div class="col-sm-6">
              		<input type="password" class="form-control" required id="password" pattern="[0-9a-fA-F]{4,12}" placeholder="Password" name="password">
              	</div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Phone</label>
              <div class="row">
                <div class="col-sm-6">
                  {{ Form::text('phone', null, array('class' => 'form-control')) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Note</label>
              <div class="row">
                <div class="col-sm-6">
                  {{ Form::textarea('note', null, array('class' => 'form-control', 'row' => 4)) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Register date</label>
              <div class="row">
                <div class="col-sm-6">
                  <input type="date" class="form-control" id="date_register" placeholder="date register" name="date_register">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Banking number</label>
              <div class="row">
                <div class="col-sm-6">
                  {{ Form::text('banking_number', null, array('class' => 'form-control')) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Image</label>
              <div class="row">
                <div class="col-sm-6">
                  {{ Form::file('image_url', null, array('class' => 'form-control')) }}
                </div>
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
