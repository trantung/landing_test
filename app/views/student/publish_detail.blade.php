@extends('admin.layout.default')

@section('title')
{{ $title='Xem | '.$student->full_name }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('PublishController@index', 'Danh sách học sinh', [], ['class' => 'btn btn-primary']) }}
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('PublishController@update', $student->id), 'method' => "PUT", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Thông tin học sinh</legend>
                                <div class="form-group">
                                    <label>Họ và tên:</label>
                                    {{ $student->full_name }}
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label><br/>
                                    <img src="{{ !empty($student->avatar) ? url($student->avatar) : NO_IMG }}" width="150px" height="auto"  />
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    {{ $student->email }}
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại :</label>
                                    {{ $student->phone }}
                                </div>
                                <div class="form-group">
                                    <label>Skype</label>
                                    {{ $student->skype }}
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ :</label>
                                    {{ $student->address }}
                                </div>
                                <div class="form-group">
                                    <label>Giới tính :</label>
                                    {{ Common::getGenderName($student->gender) }}
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh :</label>
                                    {{ $student->birth_day }}
                                </div>
                                <legend>Thông tin đính kèm</legend>
                                <div class="form-group">
                                    <label>Họ tên bố/mẹ</label>
                                    {{ $student->parent_name }}
                                </div>
                                <div class="form-group">
                                    <label>Email bố/mẹ</label>
                                    {{ $student->parent_email }}
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại bố/mẹ</label>
                                    {{ $student->parent_phone }}
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    {{ $student->comment }}
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <div class="form-group">
                                    <label>Hình thức học:</label>
                                    {{ Common::getLessonTypeByStudent($student) }}
                                </div>
                                <div class="form-group">
                                    <label>Thời lượng buổi học:</label>
                                    {{ Common::getDurationByStudent($student->id) }}
                                </div>
                                <div class="form-group">
                                    <label>Ngày bắt đầu học: </label>
                                    {{ Common::getStartDateByStudent($student->id) }}
                                </div>
                                <div class="form-group">
                                    <label>Trình độ: </label>
                                    {{ Common::getLevelName($student->level) }}
                                </div>

                                <div class="form-group">
                                    <label>Số lượng buổi học: </label>
                                    {{ Common::getNumberLesson($student->id) }}
                                </div>
                                @include('student.schedule')
                            </fieldset>
                        </div>
                    </div>
                </div> 
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Nhận học sinh</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop