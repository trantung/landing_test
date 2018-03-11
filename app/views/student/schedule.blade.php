<div class="schedule-create-form">
    <div class="form-group">
        <label>Số buổi 1 tuần: </label>
        {{ Common::getLessonPerWeekByStudent($student->id) }}
    </div>
    <div class="time-box-student">
        @foreach(Common::getSchedulePerWeek($student->id) as $k => $v)
        <div class="item form-group">
            <div class="input-group inline-block col-sm-4" >
                <label>Thứ {{ $k }} vào lúc {{ $v }}</label>
            </div>
        </div>
        @endforeach
    </div>
</div>