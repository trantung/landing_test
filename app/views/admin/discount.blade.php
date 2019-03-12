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