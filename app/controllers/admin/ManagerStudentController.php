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
        $data = Student::orderBy('created_at', 'desc');
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
        // dd($input);
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
        return Redirect::action('ManagerStudentController@index')->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Xóa thành công!');
    }

}

