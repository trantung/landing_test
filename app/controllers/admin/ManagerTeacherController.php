<?php
class ManagerTeacherController extends AdminController {
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
        $data = Teacher::all();
        return View::make('teacher.index')->with(compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('teacher.create');
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
        $input['role_id'] = getRoleIdBySlug(TEACHER);
        $teacherId = Teacher::create($input)->id;
        $input['image_url'] = CommonUpload::uploadImage($teacherId, UPLOAD_DIR, 'image_url',UPLOADTEACHER);
        CommonNormal::update($teacherId, ['image_url' => $input['image_url']] );
        return Redirect::action('ManagerTeacherController@index')->with('message','<i class="fa fa-check-square-o fa-lg"></i> 
            Teacher đã được tạo!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        dd(111);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return View::make('teacher.edit')->with(compact('teacher'));
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
        $teacher = Teacher::find($id);
        $input['image_url'] = CommonUpload::uploadImage($id, UPLOAD_DIR, 'image_url',UPLOADTEACHER,$teacher->image_url);
        $teacher->update($input);
        return Redirect::action('ManagerTeacherController@index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return Redirect::action('ManagerTeacherController@index');
    }

    public function getResetPass($id)
    {
        return View::make('teacher.reset')->with(compact('id'));
    }
    public function postResetPass($id)
    {
        $input = Input::all();
        $admin = Teacher::find($id);
        $password = Hash::make($input['password']);
        $admin->update(['password' => $password]);
        return Redirect::action('ManagerTeacherController@index');

    }
}

