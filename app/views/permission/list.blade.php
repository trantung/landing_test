@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý phân quyền' }}
@stop
@section('content')
	<div class="row margin-bottom">
	    <div class="col-xs-12">
			<a href="{{ action('PermissionController@create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm quyền mới</a>
	    </div>
	</div>
	<div class="box box-primary">
		{{ Form::open(array('action' => array('PermissionController@store'), 'method' => "POST")) }}
			<div class="box-body">
				<table class ="table table-bordered table-striped table-hover sticky-table">
					<thead>
						<tr>
							<th>Quyền truy cập</th>
							@foreach ($roles as $name)
								<th width="135px" class="text-center">{{ $name }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach (getAllPermissions() as $key => $element)
							<tr>
								<td>
									{{ $element['name'] }}
									{{ !empty($element['description']) ? '<p><i>'.$element['description'].'</i></p>' : '' }}
								</td>
								@foreach ($roles as $slug => $name)
									<td width="135px" class="text-center" style="vertical-align: middle;">
										<label>
											<input type="checkbox" name="permission[{{ $key }}][{{ $slug }}]" value="1" {{ ( $slug == ADMIN ) ? 'disabled' : '' }} {{ ( $slug == ADMIN ) ? 'checked' : '' }}>
										</label>
									</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="box-footer">
	            <button type="submit" class="btn btn-primary">Lưu lại</button>
	        </div>
		{{ Form::close() }}
	</div>
@stop