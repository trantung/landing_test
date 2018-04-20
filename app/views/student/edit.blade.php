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
                                    <img src="{{ !empty($student->avatar) ? url($student->avatar) : NO_IMG }}" width="150px" height="auto"  />
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
                                    <label>Skype<span class="text-warning"></span></label>
                                    {{  Form::text('skype', $student->skype, array('class' => 'form-control' )) }}
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
                                <div class="form-group">
                                    <label>Sale<span class="text-warning"></span></label>
                                    {{ Form::select('sale_id', Common::getSaleId(), $student->sale_id, ['class' => 'form-control']); }}
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
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Thông tin lịch học</legend>
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
                                <div class="form-group">
                                    <label>Số buổi 1 tuần: <span class="text-warning"></span></label>
                                        {{ Common::getLessonPerWeekByStudent($student->id) }}
                                </div>
                                <div class="form-group">
                                    <label>Thời gian học trước khi thay đổi <span class="text-warning"></span></label>
                                        {{ Common::getNameDateByTimeIdByStudent($student) }}
                                </div>
                                <div class="form-group">
                                    <label>Thời gian học hiện tại <span class="text-warning"></span></label>
                                        {{ Common::getNameDateByTimeIdByStudentCurrent($student) }}
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-6">
                            <div class="schedule-create-form">
                                <div class="form-group">
                                    <label>Thay đổi số buổi 1 tuần<span class="text-warning"></span></label>
                                    {{ Form::select('lesson_per_week', Common::getLessonPerWeek(), '', ['class' => 'form-control']); }}
                                </div>
                                <div class="time-box-student">
                                    @foreach([1,2,3,4,5,6,7] as $value)
                                    <div class="item form-group hidden" order="{{ $value }}">
                                        <div class="input-group inline-block col-sm-4" >
                                            <label>Chọn ngày học</label>
                                            <input type="date" class="lesson_date form-control" placeholder="Ngày vào học" name="time_id[]">
                                        </div>
                                        <div class="input-group inline-block col-sm-4" >
                                            <label>giờ băt đầu học</label>
                                            {{ Form::text('hours[]', '', ['class' => 'form-control timepicker lesson_hour']) }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
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