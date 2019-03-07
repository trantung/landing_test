@extends('admin.layout.default')

@section('title')
    {{ $title='Quản lý slide' }}
@stop
@section('content')
    <div class="row margin-bottom">
        <div class="col-xs-12">
                {{ renderUrl('SlideController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm image', [], ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    <table class ="table table-bordered table-striped table-hover">
        <tr>
            <th>STT</th>
            <th>image</th>
            <th width="145px">Thao tác</th>
        </tr>
        @foreach($data as $key => $slide)
        <tr>
            <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
            <td>
                <img src="{{ !empty($slide->image_url) ? url($slide->image_url) : NO_IMG }}" height="100px" width="100px"  />
            </td>
            <td>
                {{ Form::open(array('method'=>'DELETE', 'action' => array('SlideController@destroy', $slide->id), 'style' => 'display: inline-block;')) }}
                    <button class="btn btn-danger" title="xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-trash"></i></button>
                {{ Form::close() }}
            </td>
            
        </tr>
        @endforeach
    </table>
    <div class="clear clearfix"></div>
    {{ $data->appends(Request::except('page'))->links() }}
@stop