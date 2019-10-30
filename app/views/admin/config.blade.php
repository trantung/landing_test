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
                                <div class="form-group">
                                    <label>Title <span class="text-warning">(*)</span></label>
                                    {{  Form::text('text_config_title', $config->text_config_title, array('class' => 'form-control' )) }}
                                </div>

                                <div class="form-group">
                                    <label>Tên header <span class="text-warning">(*)</span></label>
                                    {{  Form::text('text_header', $config->text_header, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Google analytics  <span class="text-warning"></span></label>
                                    {{  Form::textarea('google_code', $config->google_code, array('class' => 'form-control', 'rows'=>5)) }}
                                </div>
				<div class="form-group">
                                    <label>Facebook code  <span class="text-warning"></span></label>
                                    {{  Form::textarea('fb_analytic', $config->fb_analytic, array('class' => 'form-control', 'rows'=>5)) }}
                                </div>

                                <div class="form-group">
                                    <label>Link video youtube  <span class="text-warning"></span></label>
                                    {{  Form::text('link_video', $config->link_video, array('class' => 'form-control')) }}
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
                                    <label>Text số lượng ưu đãi <span class="text-warning"></span></label>
                                    {{  Form::text('text_number_sale_off', $config->text_number_sale_off, array('class' => 'form-control' )) }}
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
                                <div class="form-group">
                                    <label>footer left <span class="text-warning"></span></label>{{  Form::text('text_footer_left', $config->text_footer_left, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>footer right <span class="text-warning"></span></label>{{  Form::text('text_footer_right', $config->text_footer_right, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>Text discount <span class="text-warning"></span></label>{{  Form::text('text_discount_payment', $config->text_discount_payment, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>Text footer đặt hàng <span class="text-warning"></span></label>{{  Form::text('text_footer_order', $config->text_footer_order, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>Text đặt hàng thành công<span class="text-warning"></span></label>{{  Form::text('text_order_notify', $config->text_order_notify, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>like link<span class="text-warning"></span></label>{{  Form::text('like_link', $config->like_link, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>share link<span class="text-warning"></span></label>{{  Form::text('share_link', $config->share_link, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label>Nhắn tin<span class="text-warning"></span></label>{{  Form::text('message_to', $config->message_to, array('class' => 'form-control')) }}
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
