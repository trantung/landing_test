<div class="schedule-create-form">
    <div class="form-group">
        <label>{{ trans('common.lesson_per_week_number') }}<span class="text-warning">(*)</span></label>
        {{ Form::select('lesson_per_week', Common::getLessonPerWeek(), '', ['class' => 'form-control', 'required' => 'required']); }}
    </div>
    <div class="time-box-student">
        @foreach([1,2,3,4,5,6,7] as $value)
        <div class="item form-group hidden" order="{{ $value }}">
            <div class="input-group inline-block col-sm-4" >
                <label>{{ trans('common.lesson_detail_chosse_date') }}</label>
                <input type="date" class="lesson_date form-control" placeholder="Ngày vào học" name="time_id[]">
            </div>
            <div class="input-group inline-block col-sm-4" >
                <label>{{ trans('common.lesson_detail_chosse_hour') }}</label>
                {{ Form::text('hours[]', '', ['class' => 'form-control timepicker lesson_hour']) }}
            </div>
        </div>
        @endforeach
    </div>
</div>