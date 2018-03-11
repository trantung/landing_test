<?php
class AdminController extends BaseController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'dashboard')));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Admin::all();
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
        dd('test');
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
        $input['password'] = Hash::make($input['password']);
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
                    return Redirect::action('PublishController@index');
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
}

