@extends('admin.layout.default')

@section('title')
{{ $title='config' }}
@stop
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('AdminConfigController@updateConfig'), 'method' => "POST", 'files' => true)) }}

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                                <legend>Thông tin học sinh</legend>
                                <div class="form-group">
                                    <label>Tên header <span class="text-warning">(*)</span></label>
                                    {{  Form::text('text_header', $config->text_header, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Price header <span class="text-warning">(*)</span></label>
                                    {{  Form::text('price_header', $config->price_header, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Price sale <span class="text-warning">(*)</span></label>
                                    {{  Form::text('sale_price_header', $config->sale_price_header, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>% giảm giá <span class="text-warning">(*)</span></label>
                                    {{  Form::text('promotion_price_header', $config->promotion_price_header, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>text header common <span class="text-warning">(*)</span></label>
                                    {{  Form::text('text_header_common', $config->text_header_common, array('class' => 'form-control' )) }}
                                </div>

                                <div class="form-group">
                                    <label>text fee <span class="text-warning"></span></label>
                                    {{  Form::text('text_fee_transfer', $config->text_fee_transfer, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Số lượng ưu đãi <span class="text-warning"></span></label>
                                    {{  Form::text('text_promotion_number', $config->text_promotion_number, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Phương thức phát hàng <span class="text-warning"></span></label>
                                    {{  Form::text('kind_pay', $config->kind_pay, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Phí vận chuyển <span class="text-warning"></span></label>
                                    {{  Form::text('fee_transfer', $config->fee_transfer, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Thời gian phát hàng <span class="text-warning"></span></label>
                                    {{  Form::textarea('time_export', $config->time_export, array('class' => 'form-control','rows'=>6 )) }}
                                </div>
                                <div class="form-group">
                                    <label>Thời gian giao hàng	<span class="text-warning"></span></label>
                                    {{  Form::text('time_transfer', $config->time_transfer, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Bộ phận bảo hành	<span class="text-warning"></span></label>{{  Form::textarea('quanity', $config->quanity, array('class' => 'form-control','rows'=>6 )) }}
                                </div>

                                <label>Ảnh content</label>
                                    <input type="file" name="image_body" class="form-control"><br>
                                    <img src="{{ !empty($config->image_body) ? url($config->image_body) : NO_IMG }}" width="150px" height="auto"  />


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