<div class="box alert">
	{{ Form::open(['action' => 'ManagerStudentController@index', 'method' => 'GET', 'class' => 'filter-document-form']) }}
		@if(Input::get('teacher_id'))
			{{ Form::hidden('teacher_id', Input::get('teacher_id')) }}
		@endif
		@if(Input::get('sale_id'))
			{{ Form::hidden('sale_id', Input::get('sale_id')) }}
		@endif

		<div class="input-group inline-block">
			<label>{{ trans('common.fullname') }}</label>
			{{ Form::text('full_name', Input::get('full_name'), ['class' => 'form-control', 'placeholder' => 'Họ tên']) }}
		</div>
		<div class="input-group inline-block">
			<label>Email</label>
			{{ Form::text('email', Input::get('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
		</div>
		<div class="input-group inline-block">
			<label>Phone</label>
			{{ Form::text('phone', Input::get('phone'), ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) }}
		</div>
		<div class="input-group inline-block" style="vertical-align: bottom;">
			<button type="submit" class="btn btn-primary" title="Tìm kiếm"><i class="glyphicon glyphicon-search"></i></button>
			@if(Input::get('teacher_id'))
				{{ renderUrl('ManagerStudentController@index', 'Nhập lại', ['teacher_id' => Input::get('teacher_id')], ['class' => 'btn btn-primary']) }}
			@endif
			@if(Input::get('sale_id'))
				{{ renderUrl('ManagerStudentController@index', 'Nhập lại', ['sale_id' => Input::get('sale_id')], ['class' => 'btn btn-primary']) }}
			@endif
			@if(empty(Input::get('teacher_id')) && empty(Input::get('sale_id')))
				{{ renderUrl('ManagerStudentController@index', 'Nhập lại', [], ['class' => 'btn btn-primary']) }}
			@endif
		</div>
	{{ Form::close() }}
</div>