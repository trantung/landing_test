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
                <img src="{{ !empty($config->image_body) ? url($config->image_body) : NO_IMG }}" height="150px" width="auto"  />
            </td>
            <td>
                {{ renderUrl('SlideController@edit', '<i class="glyphicon glyphicon-edit"></i>', [$slide->id], ['class' => 'btn btn-warning', 'title' => 'Sửa']) }}
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