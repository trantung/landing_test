@extends('admin.layout.default')

@section('title')
    {{ $title='Quản lý product' }}
@stop
@section('content')
    <div class="row margin-bottom">
        <div class="col-xs-12">
                {{ renderUrl('ProductController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm product', [], ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    <table class ="table table-bordered table-striped table-hover">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Code</th>
            <th>Color</th>
            <th>Price</th>
            <th>Image</th>
            <th width="145px">Thao tác</th>
        </tr>
        @foreach($data as $key => $product)
        <tr>
            <td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
            <td>
                {{ $product->text }}
            </td>
            <td>
                {{ $product->code }}
            </td>
            <td>
                {{ $product->color }}
            </td>
            <td>
                {{ $product->price }}
            </td>
            <td>
                <img src="{{ !empty($product->image_url) ? url($product->image_url) : NO_IMG }}" height="100px" width="100px"  />
            </td>
            <td>
                {{ Form::open(array('method'=>'DELETE', 'action' => array('ProductController@destroy', $product->id), 'style' => 'display: inline-block;')) }}
                    <button class="btn btn-danger" title="xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-trash"></i></button>
                {{ Form::close() }}
            </td>
            
        </tr>
        @endforeach
    </table>
    <div class="clear clearfix"></div>
    {{ $data->appends(Request::except('page'))->links() }}
@stop