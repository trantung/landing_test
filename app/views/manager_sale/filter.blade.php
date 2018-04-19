<div class="box alert">
	{{ Form::open(['action' => 'ManagerSaleController@index', 'method' => 'GET', 'class' => 'filter-document-form']) }}
		<div class="input-group inline-block">
			<label>Tên</label>
			{{ Form::text('full_name', Input::get('full_name'), ['class' => 'form-control', 'placeholder' => 'Họ tên']) }}
		</div>
		<div class="input-group inline-block">
			<label>Email</label>
			{{ Form::text('email', Input::get('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
		</div>
		<div class="input-group inline-block">
			<label>Số điện thoại</label>
			{{ Form::text('phone', Input::get('phone'), ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) }}
		</div>
		<div class="input-group inline-block" style="vertical-align: bottom;">
			<button type="submit" class="btn btn-primary" title="Tìm kiếm"><i class="glyphicon glyphicon-search"></i></button>
        	{{ renderUrl('ManagerSaleController@index', 'Nhập lại', [], ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
</div>