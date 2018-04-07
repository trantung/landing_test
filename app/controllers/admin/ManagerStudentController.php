<?php
class ManagerStudentController extends AdminController {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $input = Input::all();
        $user = currentUser();
        if ($user->model == 'Admin') {
            if (empty($input['teacher_id'])) {
                $data = Student::orderBy('created_at', 'desc');
            }
            if (!empty($input['teacher_id'])) {
                $data = Schedule::join('students', 'students.id', '=', 'schedules.student_id');
                $data = $data->where('schedules.teacher_id', $input['teacher_id']);
            }
        }
        if ($user->model == 'Teacher') {
            $data = Schedule::join('students', 'students.id', '=', 'schedules.student_id');
            $data = $data->where('schedules.teacher_id', $user->id);
        }
        if( !empty($input['full_name']) ){
            $data = $data->where('students.full_name', 'LIKE', '%'.$input['full_name'].'%');
        }
        if( !empty($input['email']) ){
            $data = $data->where('students.email', 'LIKE', '%'.$input['email'].'%');
        }
        if( !empty($input['phone']) ){
            $data = $data->where('students.phone', 'LIKE', '%'.$input['phone'].'%');
        }
        if( !empty($input['sale_id']) ){
            $data = $data->where('students.sale_id', $input['sale_id']);
        }
        $roleSale = Role::findBySlug('sale');
        if ($roleSale) {
            $roleSaleId = $roleSale->id;
            if ($user->role_id = $roleSaleId) {
                $data = $data->where('students.sale_id', $user->id);
            }
        }

        $data = $data->paginate(PAGINATE);
        return View::make('student.index')->with(compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('student.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $studentId = CommonNormal::create($input, 'Student');
        $input['avatar'] = CommonUpload::uploadImage(UPLOADSTUDENT.$studentId, 'avatar');
        CommonNormal::update($studentId, ['avatar' => $input['avatar']] );

        //create schedules
        $scheduleInput = [];
        $scheduleInput['lesson_per_week'] = $input['lesson_per_week'];
        $scheduleInput['lesson_duration'] = $input['lesson_duration'];
        $scheduleInput['lesson_number'] = $input['lesson_number'];
        $scheduleInput['type'] = $input['type'];
        $scheduleInput['start_date'] = $input['start_date'];
        $scheduleInput['level'] = $input['level'];
        $scheduleInput['student_id'] = $studentId;
        $scheduleInput['status'] = REGISTER_LESSON;
        $scheduleId = Schedule::create($scheduleInput)->id;
        //create schedule_details
        $lessonDate = [];
        for ($i=0; $i < $input['lesson_number']; $i++) { 
            foreach ($input['time_id'] as $key => $value) {
                if ($value != '' && count($lessonDate) < $input['lesson_number']) {
                    $number = $i*7;
                    $text = ' + '.$number.' days';
                    $lessonDate[] = [date('Y-m-d', strtotime($value.$text)), $input['hours'][$key]];
                }
            }
        }
        // dd($lessonDate);
        for ($i=0; $i < $input['lesson_number']; $i++) { 
            $scheduleDetail = Input::only(
                'type', 'level','lesson_duration'
            );
            $scheduleDetail['student_id'] = $studentId;
            $scheduleDetail['schedule_id'] = $scheduleId;
            $scheduleDetail['time_id'] = getTimeId($lessonDate[$i][0]);
            $scheduleDetail['status'] = REGISTER_LESSON;
            $scheduleDetail['lesson_date'] = $lessonDate[$i][0];
            $scheduleDetail['lesson_hour'] = $lessonDate[$i][1];
            $scheduleDetailId = ScheduleDetail::create($scheduleDetail)->id;
        }
        return Redirect::action('ManagerStudentController@index')->withMesage('<i class="fa fa-check-square-o fa-lg"></i> Học sinh đã được tạo!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return View::make('student.edit')->with(compact('student'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $student = Student::find($id);
        $input['avatar'] = CommonUpload::uploadImage(UPLOADSTUDENT.$id, 'avatar', $student->avatar);
        $student->update($input);

        // CommonNormal::update($id, $input, 'Student');
        return Redirect::back()->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Học sinh được lưu thành công!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        CommonNormal::delete($id, 'Student');
        return Redirect::action('ManagerStudentController@index')->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Xóa thành công!');
    }
    public function approveStudent($scheduleId)
    {
        $schedule = Schedule::find($scheduleId);
        $schedule->update(['status' => PROCESS_LESSON]);
        return Redirect::action('ManagerStudentController@index')->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Approve thành công!');

    }
    public function rejectStudent($scheduleId)
    {
        $schedule = Schedule::find($scheduleId);
        $schedule->update(['status' => PROCESS_LESSON, 'teacher_id' => null]);
        return Redirect::action('ManagerStudentController@index')->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Reject thành công!');

    }
    private function getSaleId()
    {
        $saleId = Input::get('sale_id');
        if (!$saleId) {
            $sale = currentUser();
            $saleId = $sale->id;
        }
        return $saleId;
    }
    public function saleStudent()
    {
        $input = Input::all();
        $saleId = $this->getSaleId();
        $data = Student::where('sale_id', $saleId)->orderBy('created_at', 'desc');
        if( !empty($input['full_name']) ){
            $data = $data->where('full_name', 'LIKE', '%'.$input['full_name'].'%');
        }
        if( !empty($input['email']) ){
            $data = $data->where('email', 'LIKE', '%'.$input['email'].'%');
        }
        if( !empty($input['phone']) ){
            $data = $data->where('phone', 'LIKE', '%'.$input['phone'].'%');
        }

        $data = $data->paginate(PAGINATE);
        return View::make('sale.index')->with(compact('data', 'saleId'));
    }
    public function saleStudentMonth()
    {
        // $user = currentUser();
        $input = Input::all();
        $saleId = $this->getSaleId();
        $dataNow = Common::getStudentOfSaleCurrent($saleId);
        $dataPrevious = Common::getStudentOfSalePrevious($saleId);
        return View::make('sale.student_month')->with(compact('dataNow', 'dataPrevious'));
    }
    public function saleStudentPerMonth()
    {
        $input = Input::all();
        $saleId = $this->getSaleId();
        $array = $data = [];
        if (empty($input['start_date']) && empty($input['end_date'])) {
            return View::make('sale.student_per_month')->with(compact('data'));
        }
        $ob = Student::where('sale_id', $saleId);
        if (!empty($input['start_date'])) {
            $ob = $ob->where('created_at', '>=', $input['start_date']);
        }
        if (!empty($input['end_date'])) {
            $ob = $ob->where('created_at', '<=', $input['end_date']);
        }
        $ob = $ob->orderBy('created_at', 'desc')->get();
        foreach ($ob as $key => $value) {
            $yearMonth = date("Y",strtotime($value->created_at));
            $yearMonth = $yearMonth. '-' .date("m",strtotime($value->created_at));
            $array[$yearMonth][$key] = 1;
        }
        foreach ($array as $yearMonth => $v) {
            $data[$yearMonth] = array_sum($v);
        }
        return View::make('sale.student_per_month')->with(compact('data'));
    }
}

