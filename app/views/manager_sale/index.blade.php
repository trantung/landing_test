@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý sale' }}
@stop
@section('content')
    <div class="margin-bottom">
        @include('manager_sale.filter')
    </div>
    <div class="box box-primary">
        <table class ="table table-bordered table-striped table-hover">
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tổng số học viên</th>
                <th>Tháng trước</th>
                <th>Tháng này</th>
                <th>Thao tác</th>
            </tr>
            @foreach($data as $key => $sale)
                <tr data-html="true" data-toggle="tooltip" data-placement="auto" title="<img src='{{ !empty($sale->image_url) ? url($sale->image_url) : NO_IMG }}' width='150px'>" >
                    <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
                    <td>{{ $sale->full_name }}</td>
                    <td>{{ $sale->username }}</td>
                    <td>{{ $sale->email }}</td>
                    <td>{{ $sale->phone }}</td>
                    <td>{{ Common::getStudentOfSale($sale->id) }}</td>
                    <td>{{ count(Common::getStudentOfSalePrevious($sale->id)) }}</td>
                    <td>{{ count(Common::getStudentOfSaleCurrent($sale->id)) }}</td>
                    <td>
                        {{ renderUrl('ManagerStudentController@saleStudent', '<i class="fa fa-graduation-cap"></i>', ['sale_id' => $sale->id], ['class' => 'btn btn-primary', 'title' => 'Danh sách học sinh']) }}
                        {{ renderUrl('ManagerStudentController@saleStudentPerMonth', '<i class="glyphicon glyphicon-edit"></i>', ['sale_id' => $sale->id], ['class' => 'btn btn-primary', 'title' => 'Xem thống kê sale']) }}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="clear clearfix"></div>
        {{ $data->appends(Request::except('page'))->links() }}
    </div>
@stop