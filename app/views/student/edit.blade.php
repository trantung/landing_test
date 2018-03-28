@extends('admin.layout.default')

@section('title')
{{ $title='Sửa | '.$student->full_name }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('ManagerStudentController@index', 'Danh sách học sinh', [], ['class' => 'btn btn-primary']) }}
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('ManagerStudentController@update', $student->id), 'method' => "PUT", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Thông tin học sinh</legend>
                                <div class="form-group">
                                    <label>Họ và tên <span class="text-warning">(*)</span></label>
                                    {{  Form::text('full_name', $student->full_name, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input type="file" name="avatar" class="form-control"><br>
                                    <img src="{{ file_exists(public_path().$student->avatar) ? url($student->avatar) : NO_IMG }}" width="150px" height="auto"  />
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-warning">(*)</span></label>
                                    {{  Form::email('email', $student->email, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại <span class="text-warning">(*)</span></label>
                                    {{  Form::text('phone', $student->phone, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ <span class="text-warning">(*)</span></label>
                                    {{  Form::text('address', $student->address, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Giới tính <span class="text-warning">(*)</span></label>
                                    {{ Form::select('gender', ['' => '-- Chọn --', NAM => 'Nam', NU => 'Nữ', BD => 'Không xác định'], $student->gender, ['class' => 'form-control', 'required' => 'required']); }}
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh <span class="text-warning">(*)</span></label>
                                    <input type="date" name="birth_day" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" required value="{{ $student->birth_day }}">
                                </div>
                                <legend>Thông tin đính kèm</legend>
                                <div class="form-group">
                                    <label>Họ tên bố/mẹ</label>
                                    {{  Form::text('parent_name', $student->parent_name, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Email bố/mẹ</label>
                                    {{  Form::text('parent_email', $student->parent_email, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại bố/mẹ</label>
                                    {{  Form::text('parent_phone', $student->parent_phone, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Nguồn</label>
                                    {{  Form::text('source', $student->source, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    {{  Form::textarea('comment', $student->comment, array('class' => 'form-control', 'rows' => 3 )) }}
                                </div>
                            </fieldset>
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