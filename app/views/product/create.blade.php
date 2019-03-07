@extends('admin.layout.default')

@section('title')
{{ $title='Product' }}
@stop
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('ProductController@store'), 'method' => "POST", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Name</label>
                            {{  Form::text('text', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Code</label>
                            {{  Form::text('code', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Color</label>
                            {{  Form::text('color', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Price</label>
                            {{  Form::text('price', '', array('class' => 'form-control' )) }}
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Ảnh</label>
                            <input type="file" name="image_url" class="form-control"><br>
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