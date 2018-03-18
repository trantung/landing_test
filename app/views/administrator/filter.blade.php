<div class="box alert">
	{{ Form::open(['action' => ( (Request::segment(2) == GMO) ? 'AdminController@gmoIndex' : 'AdminController@index' ), 'method' => 'GET', 'class' => 'filter-document-form']) }}
		<div class="input-group inline-block" style="max-width: 150px">
			<label>Họ tên</label>
			{{ Form::text('full_name', Input::get('full_name'), ['class' => 'form-control', 'placeholder' => 'Họ tên']) }}
		</div>
		<div class="input-group inline-block" style="max-width: 150px">
			<label>Username</label>
			{{ Form::text('username', Input::get('username'), ['class' => 'form-control', 'placeholder' => 'Username']) }}
		</div>
		<div class="input-group inline-block" style="max-width: 150px">
			<label>Email</label>
			{{ Form::text('email', Input::get('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
		</div>
		<div class="input-group inline-block" style="max-width: 150px">
			<label>Số điện thoại</label>
			{{ Form::text('phone', Input::get('phone'), ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) }}
		</div>
		@if(Request::segment(2) != GMO)
			<div class="input-group inline-block" style="max-width: 150px">
				<label>Quyền</label>
				{{  Form::select('role_id', ['' => '-- Chọn --'] + getRoleAdmin(), Input::get('role_id'), array('class' => 'form-control' )) }}
			</div>
		@endif
		<div class="input-group inline-block" style="vertical-align: bottom;">
			<button type="submit" class="btn btn-primary">Tìm kiếm</button>
        	{{ renderUrl( ( (Request::segment(2) == GMO) ? 'AdminController@gmoIndex' : 'AdminController@index'), 'Nhập lại', [], ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
</div>