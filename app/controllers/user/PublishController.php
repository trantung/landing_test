<?php
class PublishController extends AdminController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'confirmEmail')));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //lấy toàn bộ học sinh dang ky hoc nhuwng chua co giao vien nao
        $listStudentId = Schedule::whereNull('teacher_id')
            ->where('status', REGISTER_LESSON)
            ->lists('student_id');
        $data = Student::whereIn('id', $listStudentId)->paginate(PAGINATE);
        return View::make('student.publish')->with(compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return View::make('student.publish_detail')->with(compact('student'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //update vao bang schedule
        $student = Student::find($id);
        $schedule = $student->schedules()->where('status', REGISTER_LESSON)
            ->whereNull('teacher_id')->first();
        $teacher = currentUser();
        $teacherId = $teacher->id;
        $schedule->update(['teacher_id' => $teacherId]);
        //update vao bang schedule detail
        ScheduleDetail::where('schedule_id', $schedule->id)->update(['teacher_id' => $teacherId]);
        return Redirect::action('PublishController@index');
    }
    public function privateStudent()
    {
        $teacherId = Input::get('teacher_id');
        if (!$teacherId) {
            $teacher = currentUser();
            $teacherId = $teacher->id;
        }
        $data = Schedule::where('teacher_id', $teacherId)->paginate(PAGINATE);
        return View::make('student.private_teacher')->with(compact('data'));
    }
    public function showScheduleStudent($id)
    {
        $schedule = Schedule::find($id);
        $studentId = $schedule->student_id;
        $student = Student::find($studentId);
        $data = ScheduleDetail::where('schedule_id', $id)->paginate(PAGINATE);
        return View::make('student.schedule_detail')->with(compact('data', 'student'));
    }
    public function showScheduleDetail($id)
    {
        $lessonDetail = ScheduleDetail::find($id);
        $studentId = $lessonDetail->student_id;
        $student = Student::find($studentId);
        return View::make('student.lesson_detail')->with(compact('lessonDetail', 'student'));
    }
    public function updateScheduleDetail($id)
    {
        $input = Input::except('_token');
        $lessonDetail = ScheduleDetail::find($id);
        if ($input['status'] == '') {
            return Redirect::back()->with('message','<i class="fa fa-check-square-o fa-lg"></i> 
            Phải chọn trạng thái!');
        }
        if ($input['status'] != CHANGE_LESSON) {
            $lessonDetail->update($input);
            //gui mail to hoc sinh neu đã status = WAIT_CONFIRM_FINISH
            if ($input['status'] == WAIT_CONFIRM_FINISH) {
                //gui mail
                $studentId = $lessonDetail->student_id;
                $student = Student::find($studentId);
                $string = generateRandomString();
                $data = [
                    'string' => $string,
                    'lessonDetail' => $lessonDetail
                ];
                Mail::send('emails.email_student', $data, function($message) use ($student, $data){
                    $message->to($student->email)
                            ->subject(SUBJECT_EMAIL);
                });
                //send mail to admin
                // Mail::send('emails.email_student', $data, function($message) use ($student, $data){
                //     $message->to('trantunghn196@gmail.com')
                //             ->subject(SUBJECT_EMAIL);
                // });
            }
            return Redirect::action('PublishController@showScheduleStudent', $lessonDetail->schedule_id);
        }
        if ($input['status'] == CHANGE_LESSON) {
            $lessonChange = $lessonDetail->toArray();
            $lessonChange['schedule_detail_id'] = $lessonDetail->id;
            $changeId = ScheduleDetailChange::create($lessonChange)->id;
            $lessonDetail->update($input);
            return Redirect::action('PublishController@showScheduleStudent', $lessonDetail->schedule_id);
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function confirmEmail($token, $id)
    {
        $lessonDetail = ScheduleDetail::find($id);
        if ($lessonDetail) {
            $lessonDetail->update(['status' => FINISH_LESSON]);
            return 'Bạn đã xác nhận hoàn thành buổi học';
        }
        return 'Mã xác nhận sai';
    } 
    public function destroy($id)
    {
        //
    }
    public function login()
    {
        $checkLogin = Auth::user()->check();
        if($checkLogin) {
            return Redirect::action('PublishController@index');
        } else {
            return View::make('user.layout.login');
        }
    }
    public function doLogin()
    {
        $rules = array(
            'username'   => 'required',
            'password'   => 'required',
        );
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::action('PublishController@login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $checkLogin = Auth::user()->attempt($input);
            if($checkLogin) {
                // dd(5555);
                return Redirect::action('PublishController@index');
            } else {
                return Redirect::action('PublishController@login');
            }
        }
    }
    public function logout()
    {
        Auth::user()->logout();
        Session::flush();
        return Redirect::action('PublishController@login');
    }
}

