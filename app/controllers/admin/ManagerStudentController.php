<?php
class ManagerStudentController extends AdminController {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Student::paginate(PAGINATE);
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
        if( Input::hasFile('avatar') ){
            $file = Input::file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileUrl = UPLOAD_DIR.time(). '_' .$fileName;
            $uploadSuccess = $file->move(public_path().$fileUrl);
            if( $uploadSuccess ){
                ////////// Neu upload thanh cong thi luu url vao database
                $input['avatar'] = $fileUrl;
            }
        }
        $studentId = CommonNormal::create($input, 'Student');
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
        if( Input::hasFile('avatar') ){

            ////////// Xoa anh cu
            $student = Student::find($id);
            if( !empty($student->avatar) ){
                @unlink(public_path().$student->avatar);
            }
            
            $file = Input::file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileUrl = UPLOAD_DIR.$fileName;
            $uploadSuccess = $file->move(public_path().UPLOAD_DIR, $fileName);
            if( $uploadSuccess ){
                ////////// Neu upload thanh cong thi luu url vao database
                $input['avatar'] = $fileUrl;
            }
        }
        CommonNormal::update($id, $input, 'Student');
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
        return Redirect::action('ManagerStudentController@index');
    }

}

