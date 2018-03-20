<?php
class ExportController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getData(){
		$model = Input::get('model');
		$startDate = Input::get('start_date');
		$endDate = Input::get('end_date');
		switch ($model) {
			case 'student':
				if( !empty($startDate) && !empty($endDate) ){
					$students = ScheduleDetail::whereBetween('lesson_date', [$startDate, $endDate])
						->groupBy('student_id')
						->OrderBy('created_at', 'DESC')
						->get();
					$data = [];
					foreach ($students as $key => $value) {
						$totalLesson = Common::getTotalLessonOfStudent($value->student_id);
						$studiedLesson = Common::countScheduleByStatus($value->student_id, FINISH_LESSON, $startDate, $endDate);
						$data[] = [
							'STT' => $key+1,
							'Họ tên' => Common::getObject($value->student, 'full_name'),
							'Giáo viên' => Common::getObject($value->teacher, 'username'),
							'GMO' => '',
							'Tên bố mẹ' => Common::getObject($value->student, 'parent_name'),
							'SĐT' => Common::getObject($value->student, 'phone'),
							'Email' => Common::getObject($value->student, 'email'),
							'Học thử' => Common::countScheduleByType($value->student_id, TRIAL, $startDate, $endDate),
							'Hoãn' => Common::countScheduleByStatus($value->student_id, CHANGE_LESSON, $startDate, $endDate),
							'Học thật' => Common::countScheduleByType($value->student_id, OFFICAL, $startDate, $endDate),
							'Level' => Common::getLevelName($value->level),
							'Tổng số buổi' => $totalLesson,
							'Đã học' => $studiedLesson,
							'Số buổi còn lại' => $totalLesson - $studiedLesson,
							'Số lần kiểm tra trình độ' => '',
							'Sự tiến bộ' => '',
							'Ngày tham gia khóa học' => Common::getObject($value->student, 'start_date'),
							'Ngày dự kiến kết thúc' => Common::getDateScheduleFinish($value->student_id),
							'Kênh giới thiệu' => Common::getObject($value->student, 'source'),
							'Ghi chú' => Common::getObject($value->student, 'comment'),
						];
					}
					Common::exportDataExcel($data, 'export_student_'.$startDate.'__'.$endDate);
				}
				// $this->getStudent($startDate, $endDate);
				break;
				
			case 'teacher':
				# code...
				break;
				
			case 'sale':
				# code...
				break;
				
			case 'gmo':
				# code...
				break;
		}
		return View::make('export.filter');
	}

	public function getStudent($startDate = null, $endDate = null){
		if( !empty($startDate) && !empty($endDate) && strtotime($endDate) >= strtotime($startDate) ){
			$query = Student::whereBetween('created_at', [$startDate, $endDate])->orderBy('created_at', 'DESC')->get();
		} else{
			$query = Student::orderBy('created_at', 'DESC')->get();
		}
		$data = [];
		foreach ($query as $key => $value) {
			$totalLesson = Common::getTotalLessonOfStudent($value->id);
			$studiedLesson = (int)Common::getStudiedLessonOfStudent($value->id);
			$data[] = [
				'STT' => $key+1,
				'Họ tên' => $value->full_name,
				'Tên bố mẹ' => $value->pảent_name,
				'SĐT' => $value->phone,
				'Email' => $value->email,
				'Học thử' => '',
				'Hoãn' => '',
				'Học thật' => '',
				'Level' => Common::getLevelName($value->level),
				'Tổng số buổi' => $totalLesson,
				'Đã học' => $studiedLesson,
				'Số buổi còn lại' => $totalLesson - $studiedLesson,
				'Ngày tham gia khóa học' => $value->start_date,
				'Kênh giới thiệu' => $value->source,
				'Ghi chú' => $value->comment
			];
		}
		Common::exportDataExcel($data, 'student_export_'.date('d_m_y_H_i_s', time()));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getSale(){
		$query = Admin::where( 'role_id', getRoleIdBySlug('sale') )->orderBy('created_at', 'DESC')->get();
		$data = [];
		foreach ($query as $key => $value) {
			$data[] = [
				'STT' => $key+1,
				'Họ tên' => $value->full_name,
				'Username' => $value->phone,
				'Email' => $value->email,
				'Ngày đăng ký' => $value->created_at,
				'Ghi chú' => $value->comment
			];
		}
		Common::exportDataExcel($data, 'salse_export_'.date('d_m_y_H_i_s', time()));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getTeacher(){
		$query = Teacher::orderBy('created_at', 'DESC')->get();
		$data = [];
		foreach ($query as $key => $value) {
			$totalStudent = Common::getTotalStudentOfTeacher($value->id);
			$data[] = [
				'STT' => $key+1,
				'Họ tên' => $value->full_name,
				'SĐT' => $value->phone,
				'Email' => $value->email,
				'Level' => $value->level,
				'Tổng số học viên' => $totalStudent,
				'Ghi chú' => $value->note
			];
		}
		Common::exportDataExcel($data, 'teacher_export_'.date('d_m_y_H_i_s', time()));
	}

}
?>