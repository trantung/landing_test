@extends('admin.layout.default')

@section('title')
{{ $title='comment' }}
@stop
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('CommentOrderController@store'), 'method' => "POST", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Name</label>
                            {{  Form::text('name', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Comment</label>
                            {{  Form::text('comment', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Time</label>
                            {{  Form::text('time', '', array('class' => 'form-control' )) }}
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Số lượng</label>
                            {{  Form::text('status', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop