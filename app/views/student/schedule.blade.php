<div class="schedule-create-form">
    <div class="form-group">
        <label>{{ trans('common.lesson_per_week_number') }}: </label>
        {{ Common::getLessonPerWeekByStudent($student->id) }}
    </div>
    <div class="time-box-student">
        @foreach(Common::getSchedulePerWeek($student->id) as $k => $v)
        <div class="item form-group">
            <div class="input-group inline-block col-sm-4" >
                <label>{{ Common::getNameDateByTimeId($k) }} {{ trans('common.student_schedule_at') }} {{ $v }}</label>
            </div>
        </div>
        @endforeach
    </div>
</div>