@extends('admin.layout.default')

@section('title')
    {{ $title='Quản lý comment' }}
@stop
@section('content')
    <div class="row margin-bottom">
        <div class="col-xs-12">
                {{ renderUrl('CommentController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm comment', [], ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    <table class ="table table-bordered table-striped table-hover">
        <tr>
            <th>STT</th>
            <th>name</th>
            <th>comment</th>
            <th width="145px">Thao tác</th>
        </tr>
        @foreach($data as $key => $comment)
        <tr>
            <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
            <td>
                {{ $comment->name }}
            </td>
            <td>
                {{ $comment->comment }}
            </td>
            <td>
                {{ Form::open(array('method'=>'DELETE', 'action' => array('CommentController@destroy', $comment->id), 'style' => 'display: inline-block;')) }}
                    <button class="btn btn-danger" title="xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-trash"></i></button>
                {{ Form::close() }}
            </td>
            
        </tr>
        @endforeach
    </table>
    <div class="clear clearfix"></div>
    {{ $data->appends(Request::except('page'))->links() }}
@stop