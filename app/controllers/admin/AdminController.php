<?php
class AdminController extends BaseController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'dashboard')));
        $this->beforeFilter('user', array('only'=>array('dashboard')));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Admin::whereNull('status')->paginate(PAGINATE);
        return View::make('administrator.index')->with(compact('data'));
    }

    /**
     * Display list of GMO
     **/
    public function gmoIndex(){
        $input = Input::all();
        $data = Admin::where('role_id', getRoleIdBySlug('gmo'))->orderBy('created_at', 'desc');
        if( !empty($input['username']) ){
            $data = $data->where('username', 'LIKE', '%'.$input['username'].'%');
        }
        if( !empty($input['full_name']) ){
            $data = $data->where('full_name', 'LIKE', '%'.$input['full_name'].'%');
        }
        if( !empty($input['email']) ){
            $data = $data->where('email', 'LIKE', '%'.$input['email'].'%');
        }

        $data = $data->paginate(PAGINATE);
        return View::make('administrator.index')->with(compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('administrator.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_token');
        $input['password'] = Hash::make($input['password']);
        $adminId = Admin::create($input)->id;
        return Redirect::action('AdminController@index')->with('message','<i class="fa fa-check-square-o fa-lg"></i> 
            Người dùng đã được tạo!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        dd(4444444);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return View::make('administrator.edit')->with(compact('admin'));
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
        // $input['password'] = Hash::make($input['password']);
        Admin::findOrFail($id)->update($input);
        return Redirect::action('AdminController@index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return Redirect::action('AdminController@index');
    }

    public function login()
    {
        return View::make('admin.layout.login');
    }

    public function doLogin()
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::action('AdminController@login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $checkLogin = Auth::admin()->attempt($input, true);
            if($checkLogin) {
                return Redirect::action('AdminController@dashboard');
            } else {
                $checkLoginTeacher = Auth::teacher()->attempt($input, true);
                if ($checkLoginTeacher) {
                    // dd(111);
                    return Redirect::action('PublishController@privateStudent');
                } else {
                    return Redirect::action('AdminController@login');
                }
            }
        }

    }

    public function dashboard()
    {
        return View::make('admin.dashboard');
    }

    public function logout()
    {
        Auth::admin()->logout();
        Auth::teacher()->logout();
        return Redirect::action('AdminController@login');
    }

    public function getResetPass($id)
    {
        return View::make('administrator.reset')->with(compact('id'));
    }

    public function postResetPass($id)
    {
        $input = Input::all();
        $admin = Admin::find($id);
        $password = Hash::make($input['password']);
        $admin->update(['password' => $password]);
        return Redirect::action('AdminController@index');

    }

    public function getAdd(){
        return View::make('manual.create');
    }
    public function postAdd(){
        $input = Input::all();
        $student = [];
        // dd($input);
        $teacher_name = stripVN($input['name']);
        $teacher_name_array = explode(' ', $teacher_name);
        $teacher_username = implode('_', $teacher_name_array);
        // dd($tung);
        $checkTeacher = Teacher::where('full_name', $input['name'])->first();
        if ($checkTeacher) {
            return $checkTeacher->id;
        }
        $roleTeacher = Role::where('slug', TEACHER)->first();
        $admin = Admin::where('email', 'admin@gmail.com')->first();
        $inputTeacher['full_name'] = $input['name'];
        $inputTeacher['role_id'] = $roleTeacher->id;
        $inputTeacher['admin_id'] = $admin->id;
        $inputTeacher['username'] = $teacher_username;
        $inputTeacher['password'] = Hash::make('123456');
        $teacherId = Teacher::create($inputTeacher)->id;
        

        $check = Student::where('full_name', $input['full_name'])->first();
        if ($check) {
            dd($check->id);
        }
        $student['full_name'] = $input['full_name'];
        $studentId = Student::create($student)->id;
        // dd($studentId);

        return Redirect::action('AdminController@getAdd');


    }
}

