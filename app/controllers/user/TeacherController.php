<?php
class TeacherController extends AdminController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'confirmEmail')));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showScheduleTime()
    {
        $teacherId = Input::get('teacher_id');
        if (!$teacherId) {
            $teacher = currentUser();
            $teacherId = $teacher->id;
        }
        return View::make('teacher.schedule');
    }

    public function commentTeacher($id){
        $user = currentUser();
        $input = Input::all();
        $commentId = Common::saveComment($user->model.'-'.$user->id, 'Teacher-'.$input['target_id'], $input['comment'], $input['votes']);
        return Redirect::back()->withMessage('Gửi bình luận thành công!');
    }

    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
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

