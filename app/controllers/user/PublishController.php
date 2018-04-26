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
        $schedule->update(['teacher_id' => $teacherId, 'status' => WAIT_APPROVE_GMO]);
        //update vao bang schedule detail
        ScheduleDetail::where('schedule_id', $schedule->id)->update(['teacher_id' => $teacherId]);
        //tao moi trong bang notification
        $gmo = Admin::find($teacher->admin_id);
        $title = 'Giáo viên có email '.$teacher->email.' vừa nhận học sinh';
        $message = '<a href="/admin/waitting_gmo"> '.$teacher->full_name. 'nhận học sinh'. $student->full_name.'</a>';
        if ($gmo) {
            Notification::create([
                'sender_model' => 'Teacher',
                'sender_id' => $teacherId,
                'receiver_model' => 'Admin',
                'receiver_id' => $gmo->id,
                'title' => $title,
                'message' => $message,
            ]);
        }
        return Redirect::action('PublishController@index');
    }

    private function getTeacherId()
    {
        $teacherId = Input::get('teacher_id');
        if (!$teacherId) {
            $teacher = currentUser();
            $teacherId = $teacher->id;
        }
        return $teacherId;
    }

    public function privateStudent()
    {
        $teacherId = $this->getTeacherId();
        $data = Schedule::where('teacher_id', $teacherId)->paginate(PAGINATE);
        return View::make('student.private_teacher')->with(compact('data', 'teacherId'));
    }

    public function showScheduleStudent($id, $teacherId)
    {
        $schedule = Schedule::find($id);
        $studentId = $schedule->student_id;
        $student = Student::find($studentId);
        $data = ScheduleDetail::where('schedule_id', $id)->paginate(PAGINATE);
        return View::make('student.schedule_detail')->with(compact('data', 'student', 'teacherId'));
    }

    public function stopScheduleStudent($id, $teacherId)
    {
        $scheduleId = $id;
        return View::make('teacher.stop_schedule')->with(compact('scheduleId', 'teacherId'));
    }
    
    public function postStopScheduleStudent($id, $teacherId)
    {
        $input = Input::except('_token');
        // dd($input);
        $schedule = Schedule::find($id);
        $teacher = Teacher::find($teacherId);
        $input['student_id'] = $schedule->student_id;
        $input['admin_id'] = $teacher->admin_id;
        $input['teacher_id'] = $teacherId;
        StopSchedule::create($input);
        $schedule->update(['status' => STOP_LESSON]);
        return Redirect::action('PublishController@privateStudent');
    }

    public function cancelStopScheduleStudent($id, $teacherId)
    {
        $schedule = Schedule::find($id);
        $schedule->update(['status' => PROCESS_LESSON]);
        return Redirect::action('PublishController@privateStudent');
    }

    public function showScheduleDetail($id, $teacherId)
    {
        $lessonDetail = ScheduleDetail::find($id);
        $studentId = $lessonDetail->student_id;
        $student = Student::find($studentId);
        return View::make('student.lesson_detail')->with(compact('lessonDetail', 'student', 'teacherId'));
    }

    public function updateScheduleDetail($id, $teacherId)
    {
        $input = Input::except('_token');
        $lessonDetail = ScheduleDetail::find($id);

        $teacherId = $lessonDetail->teacher_id;
        if ($input['status'] == '') {
            return Redirect::back()->with('message','<i class="fa fa-check-square-o fa-lg"></i> 
            Phải chọn trạng thái!');
        }
        if ($input['status'] != CHANGE_LESSON) {
            //gui mail to hoc sinh neu đã status = WAIT_CONFIRM_FINISH
            if ($input['status'] == WAIT_CONFIRM_FINISH) {
                //gui mail
                $studentId = $lessonDetail->student_id;
                $student = Student::find($studentId);
                $string = generateRandomString();
                $data = [
                    'string' => $string,
                    'lessonDetail' => $lessonDetail,
                    'lessonDuration' => $input['lesson_duration'],
                    'comment' => $input['comment'],
                ];
                Mail::send('emails.email_student', $data, function($message) use ($student, $data){
                    $message->to($student->email)
                        ->subject(SUBJECT_EMAIL);
                });
                $teacher = Teacher::find($teacherId);
                if ($teacher) {
                    $gmoId = $teacher->admin_id;
                    $gmo = Admin::find($gmoId);
                    Mail::send('emails.email_student', $data, function($message) use ($teacher, $data){
                        $message->to($teacher->email)
                            ->subject(SUBJECT_EMAIL);
                    });
                    if ($gmo) {
                        Mail::send('emails.email_student', $data, function($message) use ($gmo, $data){
                            $message->to($gmo->email)
                                ->subject(SUBJECT_EMAIL);
                        });
                    }
                }
            }
            $lessonDetail->update($input);
            return Redirect::action('PublishController@showScheduleStudent', ['id' => $lessonDetail->schedule_id, 'teacher_id'=>$teacherId]);
        }
        if ($input['status'] == CHANGE_LESSON) {
            $lessonChange = $lessonDetail->toArray();
            $lessonChange['schedule_detail_id'] = $lessonDetail->id;
            $changeId = ScheduleDetailChange::create($lessonChange)->id;
            $lessonDetail->update($input);
            return Redirect::action('PublishController@showScheduleStudent', ['id' => $lessonDetail->schedule_id, 'teacher_id'=>$teacherId]);
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
        if ($lessonDetail->status == WAIT_CONFIRM_FINISH) {
            //update so buoi hoc con lai cua hoc sinh vao bang schedule
            $scheduleUpdate = Schedule::find($lessonDetail->schedule_id);
            if ($scheduleUpdate->remain_lesson > 1) {
                $scheduleUpdate->update(['remain_lesson' => $scheduleUpdate->remain_lesson - 1]);
            } else {
                $scheduleUpdate->update(['remain_lesson' => 0, 'status' => FINISH_LESSON_TOTAL]);
            }
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

