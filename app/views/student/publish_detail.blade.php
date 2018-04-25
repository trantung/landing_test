@extends('admin.layout.default')

@section('title')
{{ $title=trans('common.see').' | '.$student->full_name }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        {{ renderUrl('PublishController@index', trans('common.student_publish_detail_title'), [], ['class' => 'btn btn-primary']) }}
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
                                <legend>{{ trans('common.student_publish_detail_info') }}</legend>
                                <div class="form-group">
                                    <label>{{ trans('common.fullname') }}:</label>
                                    {{ $student->full_name }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_image_student') }}</label><br/>
                                    <img src="{{ !empty($student->avatar) ? url($student->avatar) : NO_IMG }}" width="150px" height="auto"  />
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    {{ $student->email }}
                                </div>
                                <div class="form-group">
                                    <label>Phone :</label>
                                    {{ $student->phone }}
                                </div>
                                <div class="form-group">
                                    <label>Skype</label>
                                    {{ $student->skype }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_address_student') }}: </label>
                                    {{ $student->address }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_sex_student') }}: </label>
                                    {{ Common::getGenderName($student->gender) }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_dob_student') }}: </label>
                                    {{ $student->birth_day }}
                                </div>
                                <legend>{{ trans('common.student_publish_detail_add_more') }}</legend>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_parent_name_student') }}</label>
                                    {{ $student->parent_name }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_parent_email_student') }}</label>
                                    {{ $student->parent_email }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_parent_phone_student') }}</label>
                                    {{ $student->parent_phone }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_parent_comment_student') }}</label>
                                    {{ $student->comment }}
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_type_student') }}: </label>
                                    {{ Common::getLessonTypeByStudent($student) }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_duration_lesson') }}: </label>
                                    {{ Common::getDurationByStudent($student->id) }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_start_date') }}: </label>
                                    {{ Common::getStartDateByStudent($student->id) }}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('common.level') }}: </label>
                                    {{ Common::getLevelName($student->level) }}
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('common.student_publish_detail_lesson_number') }}: </label>
                                    {{ Common::getNumberLesson($student->id) }}
                                </div>
                                @include('student.schedule')
                            </fieldset>
                        </div>
                    </div>
                </div> 
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('common.student_publish_detail_get_student') }}</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop