<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */
    //chung
    'see' => 'Xem',
    'trial' => 'Học thử',
    'official' => 'Học chính thức',
    'T2' => 'Thứ 2',
    'T3' => 'Thứ 3',
    'T4' => 'Thứ 4',
    'T5' => 'Thứ 5',
    'T6' => 'Thứ 6',
    'T7' => 'Thứ 7',
    'CN' => 'Chủ nhật',
    'status' => 'Trạng thái',
    'action' => 'Thao tác',
    'not_study' => 'Chưa học',
    'lesson_cancel' => 'Huỷ buổi học',
    'lesson_not_confirm' => 'Học sinh chưa xác nhận',
    'lesson_finish' => 'Hoàn thành học',
    'lesson_change_schedule' => 'Đã thay đổi lịch học',
    'reset' => 'Nhập lại',
    'password_new' => 'Mật khẩu mới',
    'password_reset_title' => 'Reset mật khẩu người dùng',
    'male' => 'Nam',
    'female' => 'Nữ',
    'both' => 'Không xác định',

    //navbar
    'account' => 'Tài khoản',
    'change_pass' => 'Thay mật khẩu',
    'logout' => 'Đăng xuất',
    'see_all' => 'Xem hết',

    //sidebar
    'sidebar_student_list_new' => 'Danh sách học sinh mới',
    'sidebar_student_list_private' => 'Danh sách học sinh cá nhân',
    'sidebar_student_list_all' => 'Danh sách học sinh tất cả',
    'sidebar_student_report_current' => 'Thống kê học sinh hiện tại',
    'sidebar_student_report' => 'Thống kê học sinh',
    'sidebar_report' => 'Báo cáo / thống kê',
    'sidebar_permission' => 'Phân quyền',
    'sidebar_manager_student' => 'Quản lý student',
    'sidebar_manager_teacher' => 'Quản lý teacher',
    'sidebar_manager_sale' => 'Quản lý sale',
    'sidebar_manager_gmo' => 'Quản lý Gmo',
    'sidebar_manager_account' => 'Quản lý thành viên',

    //student.index
    'order' => 'STT',
    'fullname' => 'Họ tên',
    'level' => 'Trình độ',
    'lesson_number' => 'Tổng số buổi của học sinh',
    'lesson_number_finish' => 'Số buổi đã hoàn thành',
    'lesson_number_cancel' => 'Số buổi đã huỷ',
    'lesson_number_remain' => 'Số buổi còn lại',
    'hour_remain' => 'Số giờ còn lại',
    'student_status' => 'Tình trạng',
    'student_action' => 'Thao tác',
    'student_study' => 'Đang học',
    'student_pause' => 'Tạm dừng',
    'student_finish' => 'Hoàn thành',
    'student_waitting_gmo' => 'Chờ GMO duyệt',
    'no_data' => 'Rất tiếc, không có dữ liệu hiển thị!',

    //student.lesson_detail
    'lesson_detail' => 'Danh sách lịch học của học sinh',
    'lesson_detail_chosse_date' => 'Chọn ngày học',
    'lesson_detail_chosse_hour' => 'Chọn giờ học',
    'lesson_detail_chosse_time' => 'Thời gian học',
    'lesson_detail_comment' => 'Nội dung buổi học và nhận xét',
    'save' => 'Lưu lại',
    'lesson_detail_detail' => 'Chi tiết |',
    'lesson_detail_wait_confirm' => 'Xác nhận hoàn thành',
    'lesson_detail_cancel' => 'Huỷ',
    'lesson_detail_change_schedule' => 'Thay đổi lịch học',

    //student.lesson_per_week
    'lesson_per_week_number' => 'Số buổi 1 tuần',

    //student.private_teacher
    'private_teacher_cancel_pause' => 'Huỷ tạm dừng',
    'private_teacher_cancel_pause_message' => 'Bạn có chắc chắn muốn huỷ tạm dừng?',

    //student.publish
    'student_publish_study_status' => 'Học thử/chính thức',
    'student_publish_same_date' => 'Trùng lịch',
    'student_publish_not_same_date' => 'Không trùng',

    //student.publish_detail
    'student_publish_detail_info' => 'Thông tin học sinh',
    'student_publish_detail_add_more' => 'Thông tin đính kèm',
    'student_publish_detail_title' => 'Danh sách học sinh',
    'student_publish_detail_image_student' => 'Ảnh đại diện',
    'student_publish_detail_address_student' => 'Địa chỉ',
    'student_publish_detail_sex_student' => 'Giới tính',
    'student_publish_detail_dob_student' => 'Ngày sinh',
    'student_publish_detail_parent_name_student' => 'Họ tên bố/mẹ',
    'student_publish_detail_parent_email_student' => 'Email bố/mẹ',
    'student_publish_detail_parent_phone_student' => 'Số điện thoại bố/mẹ',
    'student_publish_detail_parent_comment_student' => 'Ghi chú',
    'student_publish_detail_type_student' => 'Hình thức học',
    'student_publish_detail_duration_lesson' => 'Thời lượng buổi học',
    'student_publish_detail_start_date' => 'Ngày bắt đầu học',
    'student_publish_detail_lesson_number' => 'Số lượng buổi học',
    'student_publish_detail_get_student' => 'Nhận học sinh',

    //student.schedule
    'student_schedule_at' => 'vào lúc',

    //student.schedule_detail
    'student_schedule_detail' => 'Lịch học chi tiết học sinh',
    'student_schedule_detail_private' => 'Danh sách học sinh cá nhân',
    'student_schedule_detail_date' => 'Ngày giờ học',
    'student_schedule_detail_date_name' => 'Thứ trong tuần',
    'student_schedule_detail_see' => 'Xem chi tiết',
    'student_schedule_detail_not_see' => 'Chưa được xem',

    //teacher.stop_schedule
    'teacher_stop_schedule_title' => 'Tạm dừng học sinh',
    'teacher_stop_schedule_start' => 'Ngày bắt đầu tạm dừng',
    'teacher_stop_schedule_end' => 'Ngày kết thúc tạm dừng',
);
