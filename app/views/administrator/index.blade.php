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
        		{{ renderUrl('AdminController@create', 'Thêm GMO mới', ['role_id' => getRoleIdBySlug('gmo')], ['class' => 'btn btn-primary']) }}
        	@else
        		{{ renderUrl('AdminController@create', 'Thêm thành viên mới', [], ['class' => 'btn btn-primary']) }}
        	@endif
	    </div>
	</div>
	<div class="margin-bottom">
	    @include('administrator.filter')
	</div>
	<table class ="table table-bordered table-striped table-hover">
		<tr>
			<th>Họ tên</th>
			<th>Username</th>
			<th>Email</th>
			<th>Quyền</th>
			<th>Ghi chú</th>
			<th>Thao tác</th>
		</tr>
		@foreach($data as $key => $admin)
		<tr>
			<td>{{ $admin->full_name }}</td>
			<td>{{ $admin->username }}</td>
			<td>{{ $admin->email }}</td>
			<td>{{ getRoleNameById($admin->role_id) }}</td>
			<td>{{ $admin->comment }}</td>
			<td>
           		<a href="{{ action('AdminController@edit', $admin->id) }}" class="btn btn-primary">Edit</a>
				<a href="{{ action('AdminController@getResetPass', $admin->id) }} " class="btn btn-warning">Reset password</a>
		   		{{ Form::open(array('method'=>'DELETE', 'action' => array('AdminController@destroy', $admin->id), 'style' => 'display: inline-block;')) }}
           			<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Delete</button>
           		{{ Form::close() }}
           	</td>
			
		</tr>
		@endforeach
	</table>
@stop