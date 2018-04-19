@extends('admin.layout.default')

@section('title')
{{ $title='Xem chi tiết' }}
@stop
@section('content')
    <div class="box well">
        {{ Form::open(['action' => 'ManagerStudentController@saleStudentPerMonth', 'method' => 'GET']) }}
            {{ Form::hidden('sale_id', Input::get('sale_id')) }}
            <div class="input-group inline-block">
                <label>Ngày bắt đầu</label>
                <input type="date" name="start_date" value="{{ Input::get('start_date') }}" required="" class="form-control">
            </div>
            <div class="input-group inline-block">
                <label>Ngày kết thúc</label>
                <input type="date" name="end_date" value="{{ Input::get('end_date') }}" required="" class="form-control">
            </div>
            <div class="input-group inline-block" style="vertical-align: bottom;">
                <button type="submit" class="btn btn-primary">Lọc</button>
                {{ renderUrl('ManagerStudentController@saleStudentPerMonth', 'Nhập lại', [], ['class' => 'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
    @if(count($data) > 0)
    	<div class="box box-primary">
    		Số lượng học sinh mới theo tháng(năm-tháng)
			<table class ="table table-bordered table-striped table-hover">
				<tr>
					@foreach($data as $key=>$value)
					<th>Thời gian: {{$key}}</th>
					@endforeach
				</tr>
				<tr>
					@foreach($data as $key=>$value)
					<th>{{$value}} học sinh</th>
					@endforeach
				</tr>
			</table>
		</div>
    @endif
@stop