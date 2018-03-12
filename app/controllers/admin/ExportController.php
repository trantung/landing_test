<?php
class ExportController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getStudent(){
		$query = Student::orderBy('created_at', 'DESC')->get();
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
		Excel::create('student_export_'.date('d_m_y_H_i_s', time()), function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->getStyle('1')->applyFromArray(array(
					'fill' => array(
				        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
				        'color' => array('rgb' => '3c8dbc'),
				    ),
			        'font-weight' => 'bold',
			        'bold' => true,
			        'color' => array('rgb' => 'FFFFFF'),
				));
				$sheet->fromArray($data);
	        });
		})->download('xlsx');
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
				'Username' => $value->phone,
				'Email' => $value->email,
				'Ngày đăng ký' => $value->created_at,
			];
		}
		Excel::create('student_export_'.date('d_m_y_H_i_s', time()), function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->getStyle('1')->applyFromArray(array(
					'fill' => array(
				        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
				        'color' => array('rgb' => '3c8dbc'),
				    ),
			        'font-weight' => 'bold',
			        'bold' => true,
			        'color' => array('rgb' => 'FFFFFF'),
				));
				$sheet->fromArray($data);
	        });
		})->download('xlsx');
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
		Excel::create('teacher_export_'.date('d_m_y_H_i_s', time()), function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->getStyle('1')->applyFromArray(array(
					'fill' => array(
				        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
				        'color' => array('rgb' => '3c8dbc'),
				    ),
			        'font-weight' => 'bold',
			        'bold' => true,
			        'color' => array('rgb' => 'FFFFFF'),
				));
				$sheet->fromArray($data);
	        });
		})->download('xlsx');
	}

}
?>