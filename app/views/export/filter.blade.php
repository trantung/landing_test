@extends('admin.layout.default')

@section('title')
{{ $title='Xuất dữ liệu' }}
@stop
@section('content')
	<div class="box well">
		{{ Form::open(['action' => 'ExportController@getData', 'method' => 'GET']) }}
			<div class="input-group inline-block">
				<label>Dữ liệu xuất</label>
				{{ Form::select('model', ['' => '-- Chọn --']+[
					'student' => 'Học sinh',
					'teacher' => 'Giáo viên',
					'sale'	  => 'Sale',
					'gmo'	  => 'GMO'
				], Input::get('model'), ['class' => 'form-control', 'required' => 'required']) }}
			</div>
			<div class="input-group inline-block">
				<label>Ngày bắt đầu</label>
				<input type="date" name="start_date" value="{{ Input::get('start_date') }}" required="" class="form-control">
			</div>
			<div class="input-group inline-block">
				<label>Ngày kết thúc</label>
				<input type="date" name="end_date" value="{{ Input::get('end_date') }}" required="" class="form-control">
			</div>
			<div class="input-group inline-block" style="vertical-align: bottom;">
				<button type="submit" class="btn btn-primary">Export</button>
	        	{{ renderUrl('ExportController@getData', 'Nhập lại', [], ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
@stop