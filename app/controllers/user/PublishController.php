<?php
class PublishController extends AdminController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout')));
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
        $teacher = currentUser();
        $teacherId = $teacher->id;
        $data = Schedule::where('teacher_id', $teacherId)->paginate(PAGINATE);
        return View::make('student.private_teacher')->with(compact('data'));
    }
    public function showScheduleStudent()
    {
        $teacher = currentUser();
        $teacherId = $teacher->id;
        $data = Schedule::where('teacher_id', $teacherId)->paginate(PAGINATE);
        return View::make('student.private_teacher')->with(compact('data'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
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

