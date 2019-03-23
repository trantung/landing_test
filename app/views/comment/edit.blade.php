@extends('admin.layout.default')

@section('title')
{{ $title='comment' }}
@stop
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('CommentController@update', $comment->id), 'method' => "PUT", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Name</label>
                            {{  Form::text('name', $comment->name, array('class' => 'form-control' )) }}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Comment</label>
                            {{  Form::text('comment', $comment->comment, array('class' => 'form-control' )) }}
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Ảnh</label>
                            <input type="file" name="image_url" class="form-control"><br>
                            <img src="{{ !empty($comment->image_url) ? url($comment->image_url) : NO_IMG }}" width="150px" height="auto"  />
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