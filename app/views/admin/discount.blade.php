@extends('admin.layout.default')

@section('title')
{{ $title='config chiết khấu' }}
@stop
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('AdminDiscountController@store'), 'method' => "POST")) }}

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <legend>Thông tin config</legend>
                            <div class="form-group">
                                <label>% Chiết khấu <span class="text-warning">(*)</span></label>
                                {{  Form::text('percent', $discount->percent, array('class' => 'form-control' )) }}
                            </div>
                            <div class="form-group">
                                <label>Số lượng ít nhất để chiết khấu(ví dụ mua trên 2 sản phẩm mới được chiết khấu thì đặt = 2, mua trên 3 sp mới được ck đặt = 3..., nếu mua số lượng sp bất kì đều ck thì đặt = 1) <span class="text-warning">(*)</span></label>
                                {{  Form::text('number', $discount->number, array('class' => 'form-control' )) }}
                            </div>

                    </div> {{-- End row --}}
                </div> {{-- End box-body --}}

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop