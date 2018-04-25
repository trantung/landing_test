<?php
class Common {

    public static function getLevelName($level){
        if( $level == 1 ){
            return 'Level 1';
        } 
        if( $level == 2 ){
            return 'Level 2';
        }
        if( $level == 3 ){
            return 'Level 3';
        }
        if( $level == 4 ){
            return 'Level 4';
        }
        if( $level == 5 ){
            return 'Level 5';
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
            // ->whereNull('teacher_id')
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
            // ->whereNull('teacher_id')
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
            // ->whereNull('teacher_id')
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
            // ->whereNull('teacher_id')
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
            // ->whereNull('teacher_id')
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

    public static function getTotalLessonOfStudent($studentId){
        return (int)ScheduleDetail::where('student_id', $studentId)->count();
    }

    public static function getStudiedLessonOfStudent($studentId){
        return (int)ScheduleDetail::where('student_id', $studentId)->where('status', FINISH)->count();
    }

    public static function getRemainLessonOfStudent($studentId){
        return (int)ScheduleDetail::where('student_id', $studentId)->where('status', '<>', FINISH)->count();
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
    public static function getStatusSchedule($scheduleId)
    {
        $schedule = Schedule::find($scheduleId);
        if ($schedule->status == STOP_LESSON) {
            return trans('common.student_pause');
        }
        if ($schedule->status == PROCESS_LESSON) {
            return trans('common.student_study');
        }
        if ($schedule->status == FINISH_LESSON_TOTAL) {
            return trans('common.student_finish');
        }
        if ($schedule->status == WAIT_APPROVE_GMO) {
            return trans('common.student_waitting_gmo');
        }
    }

    /**
     * Export data Excel
     */
    public static function exportDataExcel($data, $fileName = null){
        if( $fileName == null ){
            $fileName = 'file_export_'.date('d_m_y__H_i_s', time());
        }
        Excel::create($fileName , function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data){
                $sheet->getStyle('1')->applyFromArray(array(
                    'fill' => array(
                        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '3c8dbc'),
                    ),
                    'font-weight' => 'bold',
                    'bold' => true,
                    'color' => array('rgb' => 'FFFFFF'),
                ));
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

    /**
     * Count schedule of a student by status
     */
    public static function countScheduleByStatus($studentId, $status, $startDate = null, $endDate = null){
        $schedule = ScheduleDetail::where('student_id', $studentId)->where('status', $status);
        if( !empty($startDate) && !empty($endDate) ){
            $schedule->whereBetween('lesson_date', [$startDate, $endDate]);
        }
        return $schedule->count();
    }

    /**
     * Count schedule of a student by type
     */
    public static function countScheduleByType($studentId, $type, $startDate = null, $endDate = null){
        $schedule = ScheduleDetail::where('student_id', $studentId)->where('type', $type);
        if( !empty($startDate) && !empty($endDate) ){
            $schedule->whereBetween('lesson_date', [$startDate, $endDate]);
        }
        return $schedule->count();
    }

    /**
     * the date of schedule finish
     */
    public static function getDateScheduleFinish($studentId){
        $schedule = ScheduleDetail::where('student_id', $studentId)->OrderBy('lesson_date', 'DESC')->first();
        if( $schedule ){
            return $schedule->lesson_date;
        }
        return null;
    }

    /**
     * Add a comment
     * @source: ModelName.id
     * @target: ModelName.id
     */
    public static function saveComment($source, $target, $comment = '', $votes = null){
        $source = explode('-', $source);
        $target = explode('-', $target);
        if( count($source) == 2 
            && count($target) == 2
            && class_exists($source[0])
            && class_exists($target[0])
            && is_numeric($source[1])
            && is_numeric($target[1]) ){

                return CommonNormal::create([
                    'model_source' => $source[0],
                    'source_id' => $source[1],
                    'model_target' => $target[0],
                    'target_id' => $target[1],
                    'comment' => $comment,
                    'votes' => $votes,
                ], 'Comment');
        }
        return false;
    }
    public static function getGmo()
    {
        $array = [
            '' => 'Chọn',
        ];
        $role = Role::where('slug', 'gmo')->first();
        $roleId = $role->id;
        $gmo = Admin::where('role_id', $roleId)->lists('username', 'id');
        $gmo = $array + $gmo;
        return $gmo;
    }

    /**
     * Add list comment of an user
     * @source: ModelName.id
     * @target: ModelName.id
     */
    public static function getComments($sourceName, $targetId, $limit = null){
        $comments = Comment::OrderBy('created_at', 'desc')->where('target_id', $targetId);
        if( !is_array($sourceName) ){
            $comments->where('model_source', $sourceName);
        } else{
            foreach ($sourceName as $value) {
                $comments->where('model_source', $value);
            }
        }
        if( $limit ){
            $comments->limit($limit);
        }
        $comments = $comments->get();
        $commentRender = [];
        foreach ($comments as $key => $comment) {
            $modelSource = $comment->model_source;
            $comment->author = ($modelSource) ? $modelSource::find($comment->source_id) : null;
            $commentRender[] = $comment;
        }
        return $comments;
    }

    public static function renderStarHtml($star){
        $star = (float)$star;
        $output = '<span class="start-area inline-block" style="text-shadow: -1px 1px 5px #d0d0d0;font-size: 16px;">';
        for ($i = 1; $i <= 5 ; $i++) {
            $output .= '<i class="fa fa-'.( ($star > $i && $star < $i+1) ? 'star-half' : 'star' ).'" style="color: '.(($star >= $i) ? 'yellow' : '#c3c3c3').'; margin: 1px;"></i>';
        }
        $output .= '</span>';
        return $output;
    }
    public static function getSaleId()
    {
        $array = [
            '' => 'Chọn',
        ];
        $role = Role::where('slug', 'sale')->first();
        $roleId = $role->id;
        $sale = Admin::where('role_id', $roleId)->lists('username', 'id');
        $sale = $array + $sale;
        return $sale;
    }
    public static function getScheduleByStudent($student)
    {
        $schedule = Schedule::where('student_id', $student->id)
            ->where('status', '!=', FINISH_LESSON_TOTAL)
            ->first();
        if ($schedule) {
            return $schedule;
        }
        return null;
    }
    public static function checkTeacherOfGmo($student)
    {
        $admin = $gmo = Auth::admin()->get();
        $roleAdmin = Role::findBySlug('admin');
        if (!$admin) {
            return false;
        }
        if ($admin->role_id == $roleAdmin->id) {
            return true;
        }
        $roleGmo = Role::findBySlug('gmo');
        if ($admin->role_id != $roleGmo->id) {
            return false;
        }
        $schedule = self::getScheduleByStudent($student);
        if (!$schedule) {
            return false;
        }
        $listTeacherId = Teacher::where('admin_id', $gmo->id)->lists('id');
        $teacherId = $schedule->teacher_id;
        if (!in_array($teacherId, $listTeacherId)) {
            return false;
        }
        return true;
    }

    public static function getLevelNameByStudent($student)
    {
        $schedule = self::getScheduleByStudent($student);
        if (!$schedule) {
            return null;
        }
        if (!$schedule->student) {
            return null;
        }
        return self::getLevelName($schedule->student->level);
    }
    public static function getDurationTimeStudentByStudent($studentId)
    {
        $schedule = Schedule::where('student_id', $studentId)
            ->where('status', PROCESS_LESSON)
            ->first();
        if (!$schedule) {
            return null;
        }
        $duration = self::getDurationTimeStudentBySchedule($schedule->id);
        return convertMinToHours($duration);
    }
    public static function getDurationTimeStudentBySchedule($scheduleId)
    {
        $schedule = Schedule::find($scheduleId);
        $lessonNumber = $schedule->lesson_number;
        $lessonDuration = $schedule->lesson_duration;
        $totalCourse = $lessonNumber * $lessonDuration;

        $durationFinish = ScheduleDetail::where('schedule_id', $scheduleId)
            ->where('status',FINISH_LESSON)
            ->sum('lesson_duration');
        $duration = $totalCourse - $durationFinish;
        return $duration;
    }
    public static function getDurationTimeStudent($lessonDetail)
    {
        $scheduleId = $lessonDetail->schedule_id;
        $duration = self::getDurationTimeStudentBySchedule($scheduleId);
        return $duration;
    }
    public static function getRemainTimeStudent($lessonDetail)
    {
        $remainTimeStudent = self::getDurationTimeStudent($lessonDetail);
        return convertMinToHours($remainTimeStudent);
    }
    public static function getRemainTimeStudentAfterConfirm($lessonDetail, $lessonDuration = null)
    {
        $remainTimeStudent = self::getDurationTimeStudent($lessonDetail);
        if ($lessonDuration) {
            $remainTimeStudentAfterConfirm = $remainTimeStudent - $lessonDuration;
        } else {
            $remainTimeStudentAfterConfirm = $remainTimeStudent - $lessonDetail->lesson_duration;
        }
        return convertMinToHours($remainTimeStudentAfterConfirm);
    }
    public static function getNameTeacherBySchedule($schedule, $field)
    {
        $teacherId = $schedule->teacher_id;
        $teacher = Teacher::find($teacherId);
        return $teacher->$field;
    }
    public static function getGmoList($slug)
    {
        $role = Role::findBySlug($slug);
        if (!$role) {
            return null;
        }
        $roleId = $role->id;
        $list = Admin::where('role_id', 5)->lists('full_name', 'id');
        return $list;
    }
    public static function getGmoOfTeacher($teacher, $field)
    {
        $gmoId = $teacher->admin_id;
        $gmo = Admin::find($gmoId);
        if (!$gmo) {
            return null;
        }
        return $gmo->$field;
    }
    public static function getLevelSchedule()
    {
        $array = ['
            ' => '-- Chọn --', 
            1 => 'level 1', 
            2 => 'level 2',
            3 => 'level 3',
            4 => 'level 4',
            5 => 'level 5',
        ];
        return $array;
    }
    public static function getStudentOfSale($saleId)
    {
        $data = Student::where('sale_id', $saleId)->count();
        return $data;
    }
    public static function getStudentOfSaleCurrent($saleId)
    {
        $monthStart = getStartMonth();
        $monthEnd = getEndMonth();
        $dataNow = Student::where('sale_id', $saleId)
            ->where('created_at', '>=', $monthStart)
            ->where('created_at', '<=', $monthEnd)
            ->get();
        return $dataNow;
    }
    public static function getStudentOfSalePrevious($saleId)
    {
        $monthStartPrevious = getStartMonthPrevious();
        $monthEndPrevious = getEndMonthPrevious();
        $dataPrevious = Student::where('sale_id', $saleId)
            ->where('created_at', '>=', $monthStartPrevious)
            ->where('created_at', '<=', $monthEndPrevious)
            ->get();
        return $dataPrevious;
    }
    public static function getNameDateByTimeId($timeId)
    {
        if ($timeId == T2) {
            return 'Thứ 2';
        }
        if ($timeId == T3) {
            return 'Thứ 3';
        }
        if ($timeId == T4) {
            return 'Thứ 4';
        }
        if ($timeId == T5) {
            return 'Thứ 5';
        }
        if ($timeId == T6) {
            return 'Thứ 6';
        }
        if ($timeId == T7) {
            return 'Thứ 7';
        }
        if ($timeId == CN) {
            return 'Chủ nhật';
        }

    }
    public static function checkTimeConfirm($lessonId, $teacherId)
    {
        $now = time();
        $time = date('Y-m-d', $now);
        $lesson = ScheduleDetail::find($lessonId);
        $lessonDate = $lesson->lesson_date;
        if ($time >= $lessonDate ) {
           return true;
        }
        return false;
    }
    public static function getNumberLessonRemainTeacher($teacherId, $studentId = null)
    {
        if ($studentId) {
            $data = ScheduleDetail::where('teacher_id', $teacherId)
                ->where('student_id', $studentId)
                ->whereIn('status', [REGISTER_LESSON,CANCEL_LESSON,CHANGE_LESSON])
                ->count();
            return $data;
        }
        $data = ScheduleDetail::where('teacher_id', $teacherId)
            ->whereIn('status', [REGISTER_LESSON,CANCEL_LESSON,CHANGE_LESSON])
            ->count();
        return $data;
    }
    public static function getNameDateByTimeIdByStudent($student)
    {
        $dateNow = date('Y-m-d', time());
        $studentId = $student->id;
        $data = ScheduleDetail::where('student_id', $studentId)
            ->where('status', '!=', FINISH_LESSON)
            ->where('lesson_date', '<=', $dateNow)
            ->groupBy('time_id')->groupBy('lesson_hour')->lists('lesson_hour', 'time_id');
        $text = '';
        foreach ($data as $timeId => $lessonHour) {
            $text = $text . self::getNameDateByTimeId($timeId) . '--Giờ học: ' . $lessonHour . '; ';
        }
        return $text;
    }
    public static function getNameDateByTimeIdByStudentCurrent($student)
    {
        $dateNow = date('Y-m-d', time());
        $studentId = $student->id;
        $data = ScheduleDetail::where('student_id', $studentId)
            ->where('status', '!=', FINISH_LESSON)
            ->where('lesson_date', '>=', $dateNow)
            ->groupBy('time_id')->groupBy('lesson_hour')->lists('lesson_hour', 'time_id');
        $text = '';
        foreach ($data as $timeId => $lessonHour) {
            $text = $text . self::getNameDateByTimeId($timeId) . '--Giờ học: ' . $lessonHour . '; ';
        }
        return $text;
    }
    public static function getTeacherId()
    {
        $array = ['' => 'Chọn teacher'];
        $gmo = currentUser();
        $roleGmo = Role::findBySlug('gmo');
        if ($admin->role_id == $roleGmo->id) {
            $data = Teacher::where('admin_id', $gmo->id)->lists('full_name', 'id');
            return $array + $data;
        }
        $data = Teacher::lists('full_name', 'id');
        return $array + $data;
    }
}

