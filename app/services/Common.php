<?php
class Common {

    public static function getLevelName($level){
        if( $level == BEGINING ){
            return 'Begining';
        } elseif( $level == ADVANCE ){
            return 'Advance';
        }
        return '';
    }

    public static function getGenderName($gender){
        if( $gender == NAM ){
            return 'Nam';
        } elseif( $gender == NU ){
            return 'Nữ';
        }
        return 'Không xác định';
    }

    public static function getValueOfObject($ob, $method, $field, $default = null)
    {
        if (!self::getObject($ob,$method)) {
            return $default;
        }
        if (!($ob->$method->$field)) {
            return $default;
        }
        return $ob->$method->$field;
    }

    public static function getObject($ob, $method, $default = null)
    {
        if (!($ob)) {
            return $default;
        }
        if (!($ob->$method)) {
            return $default;
        }
        return $ob->$method;
    }
    
    public static function checkExist($modelName, $value, $field)
    {
        $check = $modelName::where($field, $value)->first();
        if ($check) {
            return true;
        }
        return false;
    }

    public static function getRoles()
    {
        $list = Role::lists('name', 'slug');
        if( count($list) == 0 ){
            $list = [
                ADMIN => 'ADMINISTRATOR',
                WEBMASTER => 'WEBMASTER',
                SALE => 'SALE',
                TEACHER => 'TEACHER',
            ];
        }
        return $list;
    }
    public static function getLessonPerWeek()
    {
        $array = ['' => '-- Chọn --', 
            1 => 1, 
            2 => 2, 
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
        ];
        return $array;
    }

    public static function getLessonTypeByStudent($student)
    {
        $schedule = $student->schedules()
            ->whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)->first();
        if (!$schedule) {
            return null;
        }
        $type = self::getLessonType($schedule->type);
        return $type;
    }
    public static function getLessonType($type)
    {
        if ($type == TRIAL) {
            return 'Học thử';
        }
        if ($type == OFFICAL) {
            return 'Học thật';
        }
        return null;    
    }
    public static function getDurationByStudent($studentId)
    {
        $ob = Schedule::where('student_id', $studentId)
            ->whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)
            ->first();
        if ($ob) {
            return $ob->lesson_duration;
        }
        return null;
    }
    public static function getStartDateByStudent($studentId)
    {
        $ob = Schedule::where('student_id', $studentId)
            ->whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)
            ->first();
        if ($ob) {
            return $ob->start_date;
        }
        return null;
    }
    public static function getNumberLesson($studentId)
    {
        $ob = Schedule::where('student_id', $studentId)
            ->whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)
            ->first();
        if ($ob) {
            return $ob->lesson_number;
        }
        return null;
    }
    public static function getLessonPerWeekByStudent($studentId)
    {
        $ob = Schedule::where('student_id', $studentId)
            ->whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)
            ->first();
        if ($ob) {
            return $ob->lesson_per_week;
        }
        return null;
    }
    public static function getSchedulePerWeek($studentId)
    {
        $ob = ScheduleDetail::where('student_id', $studentId)
            ->whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)
            ->groupBy('time_id')
            ->lists('lesson_hour', 'time_id');
        return $ob;
    }
    public static function checkSameSchedule($studentId, $teacherId = null)
    {
        if ($teacherId) {
            $teacher = Teacher::find($teacherId);
        } else{
            $teacher = currentUser();
        }
        $scheduleStudent = ScheduleDetail::where('status', REGISTER_LESSON)
            ->where('student_id', $studentId)
            ->lists('lesson_date');
        $sameScheduleDate = ScheduleDetail::where('teacher_id', $teacher->id)
            ->whereIn('lesson_date', $scheduleStudent)
            // ->lists('id');
            ->get();
        // dd($sameScheduleDate);
        if (count($sameScheduleDate) == 0) {
            return false;
        }
        foreach ($sameScheduleDate as $value) {
            $lessonHourTeacher = $value->lesson_hour;
            $lessonStudent = ScheduleDetail::where('status', REGISTER_LESSON)
                ->where('lesson_date', $value->lesson_date)
                ->where('student_id', $studentId)
                ->first();
            if (!$lessonStudent) {
                return false;
            }
            $lessonHourStudent = $lessonStudent->lesson_hour;
            // dd($lessonHourTeacher);
            $check = abs(strtotime($lessonHourTeacher) - strtotime($lessonHourStudent))/60;
            if ($check <= $lessonStudent->lesson_duration) {
                return true;
            }
        }
        // dd(111);
        return false;
    }

    public static function getTotalStudentOfTeacher($teacherId){
        return Schedule::where('teacher_id', $teacherId)->count();
    }

    public static function getHourTeachOfTeacher($teacherId){
        $data = ScheduleDetail::select(DB::raw('SUM(lesson_duration) as sum'))
            ->where('teacher_id', $teacherId)->where('status', FINISH)->first();
        return (int)$data->sum/60;
    }

    public static function getHourCancelOfTeacher($teacherId){
        $data = ScheduleDetail::select(DB::raw('SUM(lesson_duration) as sum'))->where('teacher_id', $teacherId)->where('status', CANCEL_LESSON)->first();
        return (int)$data->sum/60;
    }

    public static function getLevelTeacherList(){
        return [
            '' => '-- Tất cả --',
            1 => 'Level 1',
            2 => 'Level 2',
            3 => 'Level 3',
            4 => 'Level 4',
            5 => 'Level 5'
        ];
    }
    
    public static function getNumberLessonStatus($scheduleId, $status)
    {
        $count = ScheduleDetail::where('schedule_id', $scheduleId)
            ->where('status', $status)
            ->count();
        return $count;
    }

}