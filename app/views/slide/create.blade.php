@extends('admin.layout.default')

@section('title')
{{ $title='image' }}
@stop
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('SlideController@store'), 'method' => "POST", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Ảnh</label>
                                <input type="file" name="image_url" class="form-control"><br>
                                <img src="{{ !empty($image->image_url) ? url($image->image_url) : NO_IMG }}" width="150px" height="auto"  />


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